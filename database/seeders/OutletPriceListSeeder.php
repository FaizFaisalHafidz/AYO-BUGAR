<?php

namespace Database\Seeders;

use App\Models\OutletPriceList;
use App\Models\OutletService;
use Illuminate\Database\Seeder;

class OutletPriceListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = OutletService::all();
        
        foreach ($services as $service) {
            // Base price depends on service type
            $basePrice = 0;
            
            if (str_contains($service->service_name, 'Personal')) {
                $basePrice = 350000; // Personal training is expensive
            } elseif (str_contains($service->service_name, 'Massage')) {
                $basePrice = 250000;
            } elseif (str_contains($service->service_name, 'Consultation')) {
                $basePrice = 200000;
            } else {
                $basePrice = rand(100000, 150000); // Regular classes
            }
            
            // Create a price entry for the service
            OutletPriceList::create([
                'outlet_id' => $service->outlet_id,
                'outlet_service_id' => $service->id,
                'price' => $basePrice,
                'month_expired_date' => now()->addMonths(6),
                'created_by' => 1
            ]);
        }
    }
}