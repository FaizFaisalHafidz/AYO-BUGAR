<?php

namespace Database\Seeders;

use App\Models\Outlet;
use App\Models\OutletService;
use Illuminate\Database\Seeder;

class OutletServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $outlets = Outlet::all();

        $services = [
            'Fitness Class' => 'Regular fitness class with professional trainers',
            'Yoga Session' => 'Relaxing yoga sessions for all levels',
            'Swimming' => 'Access to our Olympic-sized swimming pool',
            'Personal Training' => 'One-on-one training with certified trainers',
            'Nutrition Consultation' => 'Personalized nutrition advice from experts',
            'Sauna Access' => 'Access to our state-of-the-art sauna facilities',
            'Massage Therapy' => 'Professional massage therapy sessions',
            'Boxing Class' => 'High-intensity boxing training',
            'Pilates' => 'Core-strengthening pilates classes',
            'CrossFit' => 'Varied high-intensity functional movements'
        ];

        foreach ($outlets as $outlet) {
            // Each outlet gets a random selection of 4-8 services
            $selectedServices = array_rand($services, rand(4, 8));
            if (!is_array($selectedServices)) {
                $selectedServices = [$selectedServices];
            }
            
            foreach ($selectedServices as $serviceName) {
                OutletService::create([
                    'outlet_id' => $outlet->id,
                    'service_name' => $serviceName,
                    'description' => $services[$serviceName],
                    'expired_date' => now()->addYear(),
                    'created_by' => 1
                ]);
            }
        }
    }
}