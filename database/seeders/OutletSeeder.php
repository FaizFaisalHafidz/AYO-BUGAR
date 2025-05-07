<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $outlets = [
            [
                'name' => 'AYO BUGAR Tebet',
                'code' => 'AYO-TBT',
                'dob' => Carbon::now()->subYears(2), // establishment date
                'email' => 'tebet@ayobugar.com',
                'wa_number' => '08112233445',
                'effective_date' => Carbon::now()->subYear(),
                'expired_date' => Carbon::now()->addYears(5),
                'meta_card_design' => json_encode(['color' => 'blue', 'logo' => 'logo.png']),
                'created_by' => 1
            ],
            [
                'name' => 'AYO BUGAR Kemang',
                'code' => 'AYO-KMG',
                'dob' => Carbon::now()->subYears(1)->subMonths(6),
                'email' => 'kemang@ayobugar.com',
                'wa_number' => '08122334455',
                'effective_date' => Carbon::now()->subMonths(10),
                'expired_date' => Carbon::now()->addYears(5),
                'meta_card_design' => json_encode(['color' => 'green', 'logo' => 'logo.png']),
                'created_by' => 1
            ],
            [
                'name' => 'AYO BUGAR Menteng',
                'code' => 'AYO-MTG',
                'dob' => Carbon::now()->subYear(),
                'email' => 'menteng@ayobugar.com',
                'wa_number' => '08133445566',
                'effective_date' => Carbon::now()->subMonths(6),
                'expired_date' => Carbon::now()->addYears(5),
                'meta_card_design' => json_encode(['color' => 'red', 'logo' => 'logo.png']),
                'created_by' => 1
            ],
        ];

        foreach ($outlets as $outlet) {
            Outlet::create($outlet);
        }
    }
}
