<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'rin@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'nik' => '3204280604078882',
                'name' => 'Admin Rin',
                'email_verified_at' => now(),
                'wa_number' => '083768598476231',
                'join_date' => now()
            ]

        );
        User::updateOrCreate([
            'password' => Hash::make('password'),
            'email' => 'erp@gmail.com',
        ], [
            'nik' => '3546280604078758',
            'name' => 'Admin ERP',
            'email_verified_at' => now(),
            'wa_number' => '08376859847657',
            'join_date' => now()
        ]);
    }
}
