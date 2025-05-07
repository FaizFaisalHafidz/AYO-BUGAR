<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

use App\Models\AttendanceMember;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanKehadiranController extends Controller
{
    /**
     * Get attendance report with card member and outlet details
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            // Load attendance data with proper relationships, limited to 10 records
            $attendances = $this->getAttendanceData(10);

            // Transform the data for the response
            $formattedData = $this->formatAttendanceData($attendances);

            return ResponseFormatter::success(
                $formattedData,
                'Data laporan kehadiran berhasil diambil'
            );
        } catch (\Exception $e) {
            return ResponseFormatter::error(
                null,
                'Terjadi kesalahan saat mengambil data laporan kehadiran: ' . $e->getMessage(),
                500
            );
        }
    }

    /**
     * Get attendance data with relationships
     *
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getAttendanceData($limit = 10)
    {
        return AttendanceMember::with([
            'cardMember:id,card_code,card_member_name,email,wa_number,effective_date,expired_date,outlet_id',
            'cardMember.outlet:id,code,name'
        ])->orderBy('date', 'desc')
          ->orderBy('check_in', 'desc')
          ->limit($limit)
          ->get();
    }

    /**
     * Format attendance data for response
     *
     * @param \Illuminate\Database\Eloquent\Collection $attendances
     * @return \Illuminate\Support\Collection
     */
    private function formatAttendanceData($attendances)
    {
        return $attendances->map(function ($attendance) {
            return [
                'id' => $attendance->id,
                'tanggal' => Carbon::parse($attendance->date)->format('Y-m-d'),
                'tanggal_indo' => ResponseFormatter::tanggalIndonesia($attendance->date),
                'check_in' => $this->formatTime($attendance->check_in),
                'check_out' => $this->formatTime($attendance->check_out),
                'member' => $this->formatMemberData($attendance->cardMember),
                'lokasi' => $this->formatLocationData($attendance->cardMember->outlet ?? null),
            ];
        });
    }

    /**
     * Format time to H:i:s
     *
     * @param string|null $time
     * @return string|null
     */
    private function formatTime($time)
    {
        return $time ? Carbon::parse($time)->format('H:i:s') : null;
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
        
}
