<?php

namespace Database\Seeders;

use App\Models\CardMember;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CardMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $members = [
            [
                'name' => 'Budi Santoso',
                'card_number' => 'CM-' . Str::random(8),
                'dob' => Carbon::now()->subYears(30),
                'phone' => '081234567890',
                'email' => 'budi@example.com',
                'membership_type' => 'Premium',
                'effective_date' => Carbon::now()->subMonths(3),
                'expired_date' => Carbon::now()->addYear(),
                'created_by' => 1
            ],
            [
                'name' => 'Siti Aminah',
                'card_number' => 'CM-' . Str::random(8),
                'dob' => Carbon::now()->subYears(25),
                'phone' => '082345678901',
                'email' => 'siti@example.com',
                'membership_type' => 'Regular',
                'effective_date' => Carbon::now()->subMonths(5),
                'expired_date' => Carbon::now()->addYear(),
                'created_by' => 1
            ],
            [
                'name' => 'Joko Widodo',
                'card_number' => 'CM-' . Str::random(8),
                'dob' => Carbon::now()->subYears(40),
                'phone' => '083456789012',
                'email' => 'joko@example.com',
                'membership_type' => 'Premium',
                'effective_date' => Carbon::now()->subMonths(2),
                'expired_date' => Carbon::now()->addYear(),
                'created_by' => 1
            ],
            [
                'name' => 'Dewi Lestari',
                'card_number' => 'CM-' . Str::random(8),
                'dob' => Carbon::now()->subYears(28),
                'phone' => '084567890123',
                'email' => 'dewi@example.com',
                'membership_type' => 'Regular',
                'effective_date' => Carbon::now()->subMonths(4),
                'expired_date' => Carbon::now()->addYear(),
                'created_by' => 1
            ],
            [
                'name' => 'Bambang Sutedjo',
                'card_number' => 'CM-' . Str::random(8),
                'dob' => Carbon::now()->subYears(35),
                'phone' => '085678901234',
                'email' => 'bambang@example.com',
                'membership_type' => 'Premium',
                'effective_date' => Carbon::now()->subMonths(1),
                'expired_date' => Carbon::now()->addYear(),
                'created_by' => 1
            ],
        ];

        foreach ($members as $member) {
            CardMember::create($member);
        }
    }
}
