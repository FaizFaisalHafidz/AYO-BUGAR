<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\OutletTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanKeuanganController extends Controller
{
    /**
     * Get transaction history
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTransactionHistory(Request $request)
    {
        try {
            $limit = $request->input('limit', 10);
            $outletId = $request->input('outlet_id');
            $cardMemberId = $request->input('card_member_id');
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            
            // Query using eager loading and indexing the database effectively
            $query = OutletTransaction::with([
                    'details' => function($query) {
                        $query->select('id', 'outlet_transaction_id', 'item', 'total');
                    },
                    'outlet:id,code,name', // Add outlet relationship
                    'cardMember:id,card_code,card_member_name,email,wa_number,effective_date,expired_date,outlet_id'
                ])
                ->select('id', 'date', 'total', 'outlet_id', 'card_member_id')
                ->when($outletId, function($query) use ($outletId) {
                    return $query->where('outlet_id', $outletId);
                })
                ->when($cardMemberId, function($query) use ($cardMemberId) {
                    return $query->where('card_member_id', $cardMemberId);
                })
                ->when($startDate && $endDate, function($query) use ($startDate, $endDate) {
                    return $query->whereBetween('date', [$startDate, $endDate]);
                })
                ->orderBy('date', 'desc');
                
            // Execute the query with pagination
            $transactions = $query->paginate($limit);
            
            // Transform the data to a cleaner format
            $transformedData = $transactions->map(function($transaction) {
                return [
                    'id' => $transaction->id,
                    'tanggal' => $transaction->date->format('Y-m-d'),
                    'total' => $transaction->total,
                    'items' => $transaction->details->map(function($detail) {
                        return [
                            'item' => $detail->item,
                            'total' => $detail->total
                        ];
                    }),
                    'lokasi' => $this->formatLocationData($transaction->outlet),
                ];
            });
            
            // Format pagination info
            $pagination = ResponseFormatter::formatPaginationFromData($transactions);
            
            return ResponseFormatter::paginationArray(
                $transformedData,
                'Transaction history retrieved successfully',
                $pagination
            );
            
        } catch (\Exception $error) {
            return ResponseFormatter::error(
                null,
                'An error occurred while retrieving transaction history: ' . $error->getMessage(),
                500
            );
        }
    }

    /**
     * Format location data
     *
     * @param mixed $outlet
     * @return array
     */
    private function formatLocationData($outlet)
    {
        return [
            'id' => $outlet->id ?? null,
            'code' => $outlet->code ?? null,
            'name' => $outlet->name ?? null,
        ];
    }

    /**
     * Format member data
     *
     * @param mixed $member
     * @return array
     */
    private function formatMemberData($member)
    {
        return [
            'id' => $member->id ?? null,
            'code' => $member->card_code ?? null,
            'name' => $member->card_member_name ?? null,
            'email' => $member->email ?? null,
            'wa_number' => $member->wa_number ?? null,
            'effective_date' => $member->effective_date ?? null,
            'expired_date' => $member->expired_date ?? null,
        ];
    }
}
