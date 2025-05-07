<?php

namespace Database\Seeders;

use App\Models\CardMember;
use App\Models\Outlet;
use App\Models\OutletPriceList;
use App\Models\OutletService;
use App\Models\OutletTransaction;
use App\Models\OutletTransactionDetail;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OutletTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $outlets = Outlet::all();
        $members = CardMember::all();
        
        // Generate 50 random transactions
        for ($i = 0; $i < 50; $i++) {
            // Choose random outlet and member
            $outlet = $outlets->random();
            $member = $members->random();
            
            // Generate random date within last 3 months
            $date = Carbon::now()->subDays(rand(1, 90));
            
            // Get available services for this outlet
            $availableServices = OutletService::where('outlet_id', $outlet->id)->get();
            
            // Only proceed if the outlet has services
            if ($availableServices->isNotEmpty()) {
                // Choose 1-3 random services for this transaction
                $numServices = rand(1, min(3, $availableServices->count()));
                $selectedServices = $availableServices->random($numServices);
                
                $total = 0;
                $details = [];
                $mainPriceListId = null; // To store a primary price list ID for the transaction
                
                // Create transaction details for each service
                foreach ($selectedServices as $service) {
                    // Get price for this service
                    $priceList = OutletPriceList::where('outlet_service_id', $service->id)
                        ->where('outlet_id', $outlet->id)
                        ->first();
                    
                    if ($priceList) {
                        // Store the first price list ID as the main one
                        if ($mainPriceListId === null) {
                            $mainPriceListId = $priceList->id;
                        }
                        
                        $price = $priceList->price;
                        $total += $price;
                        
                        // Store details for later creation
                        $details[] = [
                            'item' => $service->service_name,
                            'total' => $price,
                            'description' => $service->description,
                            'price_list_id' => $priceList->id
                        ];
                    }
                }
                
                // Create the transaction if there are valid details
                if (!empty($details)) {
                    $transaction = OutletTransaction::create([
                        'outlet_id' => $outlet->id,
                        'card_member_id' => $member->id,
                        'outlet_price_list_id' => $mainPriceListId, // Use the first price list ID
                        'date' => $date,
                        'total' => $total,
                        'description' => 'Transaction on ' . $date->format('Y-m-d'),
                        'created_by' => 1
                    ]);
                    
                    // Create the transaction details
                    foreach ($details as $detail) {
                        OutletTransactionDetail::create([
                            'outlet_transaction_id' => $transaction->id,
                            'item' => $detail['item'],
                            'total' => $detail['total'],
                            'description' => $detail['description'],
                            'created_by' => 1
                        ]);
                    }
                }
            }
        }
    }
}