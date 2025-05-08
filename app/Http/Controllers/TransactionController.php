<?php

namespace App\Http\Controllers;

use App\Models\CardMember;
use App\Models\Outlet;
use App\Models\OutletTransaction;
use App\Models\OutletTransactionDetail;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    public function index(){
        $outlet = Outlet::first();

        return view('transaction.index', compact(['outlet']));
    }

    public function store(Request $request){

        try{
            $is_kartu = $request->is_kartu ?? null;
            $card = null;
            $item = $request->item ?? [];
            $total = $request->total ?? [];
            $kode_kartu = $request->kartu_kode ?? null;
            $card = CardMember::where('card_code', $kode_kartu)->first();
            $months_total = 0;
    
            $transaction = OutletTransaction::create([
                'outlet_id' => $request->outlet_id,
                'card_member_id' => $card->id,
                'total' => array_sum($total),
                'date'  => $request->tanggal,
                'created_by' => 1,
                'description'   => '',
                'outlet_price_list_id'  => 1,
            ]);

            foreach($item as $index => $data){
                OutletTransactionDetail::create([
                    'outlet_transaction_id'    => $transaction->id,
                    'item'                  => 'paket ' .$data . ' bulan',
                    'total'                 => $total[$index],
                    'description'           => '',
                    'created_by'            => 1,
                ]);
    
                if($data != 'member_card'){
                    $months_total += $data;
                }
            }
    
            $expired_date = (isset($card->expired_date)) ? Carbon::parse($card->expired_date) : now();
            // dd($expired_date->addMonths(1));
            $card->effective_date = now()->format('Y-m-d');
            $card->expired_date = $expired_date->addMonths($months_total);
            $card->save();
    
            if($is_kartu){
                return redirect()->route('transaction.kartu');
            }else{
                return redirect()->route('transaction.index')->with('success', 'Berhasil menambah data!');
            }

        }catch(Exception $e){
            Log::error($e);
        }
        
    }
    
    public function kartu(){
        $card = CardMember::orderBy('created_at', 'desc')->first();
        $id = $card->id;
        return view('transaction.kartu', compact(['id']));
    }
    
    public function kartuStore(Request $request){
        $id = $request->kartu_id;
        $card = CardMember::find($id);

        $card->card_member_name = $request->member_name;
        $card->nik = $request->nik;
        $card->wa_number = $request->wa_number;
        $card->save();
        
        return redirect()->route('transaction.index')->with('success', 'Berhasil menambah data!');

    }

}
