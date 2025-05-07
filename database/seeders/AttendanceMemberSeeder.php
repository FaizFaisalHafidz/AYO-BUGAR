<?php

namespace Database\Seeders;

use App\Models\AttendanceMember;
use App\Models\CardMember;
use App\Models\Outlet;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AttendanceMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // First ensure we have outlets, users, and cards
        // $this->createOutletsIfNeeded();
        $this->createUsersIfNeeded();
        $this->createCardMembersIfNeeded();

        // Get all cards for reference
        $cardMembers = CardMember::all();
        
        if ($cardMembers->isEmpty()) {
            $this->command->info('No card members found. Please run the card member seeder first.');
            return;
        }

        // Clear existing attendance records
        if (Schema::hasTable('attendance_members')) {
            DB::table('attendance_members')->truncate();
        }
        
        // Generate attendance records for the past 30 days
        $startDate = Carbon::now()->subDays(30);
        $endDate = Carbon::now();
        
        $this->command->info('Generating attendance records...');
        
        // Loop through each day
        for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
            // For each day, create 1-5 random attendance records
            $recordsCount = rand(1, 5);
            
            for ($i = 0; $i < $recordsCount; $i++) {
                // Pick a random card member
                $cardMember = $cardMembers->random();
                
                // Generate check-in time (between 6:00 AM and 9:00 PM)
                $checkInHour = rand(6, 21);
                $checkInMinute = rand(0, 59);
                $checkIn = Carbon::parse($date->format('Y-m-d'))->setHour($checkInHour)->setMinute($checkInMinute);
                
                // Generate check-out time (15 mins to 3 hours after check-in)
                // Some records may have null check-out (about 15% chance)
                $hasCheckOut = rand(1, 100) <= 85;
                $checkOut = null;
                
                if ($hasCheckOut) {
                    $stayDuration = rand(15, 180); // 15 mins to 3 hours
                    $checkOut = (clone $checkIn)->addMinutes($stayDuration);
                }
                
                // Create the attendance record
                AttendanceMember::create([
                    'card_member_id' => $cardMember->id,
                    'date' => $date->format('Y-m-d'),
                    'check_in' => $checkIn,
                    'check_out' => $checkOut,
                    'created_by' => rand(1, 5), // Some admin user ID
                    'created_at' => $checkIn,
                    'updated_at' => $checkOut ?? $checkIn,
                ]);
            }
        }
        
        $this->command->info('Attendance records seeded successfully!');
    }

    /**
     * Create users if none exist
     */
    private function createUsersIfNeeded()
    {
        if (User::count() < 5) {
            $this->command->info('Creating users...');
            
            // Get the actual column names from the users table
            $columns = Schema::getColumnListing('users');
            $this->command->info('Available columns in users table: ' . implode(', ', $columns));
            
            $users = [
                ['name' => 'Admin User', 'email' => 'admin@ayobugar.id', 'code' => 'ADM001', 'nik' => '3174010101800001'],
                ['name' => 'Manager', 'email' => 'manager@ayobugar.id', 'code' => 'MGR001', 'nik' => '3174010101800002'],
                ['name' => 'Staff One', 'email' => 'staff1@ayobugar.id', 'code' => 'STF001', 'nik' => '3174010101800003'],
                ['name' => 'Staff Two', 'email' => 'staff2@ayobugar.id', 'code' => 'STF002', 'nik' => '3174010101800004'],
                ['name' => 'Receptionist', 'email' => 'reception@ayobugar.id', 'code' => 'RCP001', 'nik' => '3174010101800005'],
            ];
            
            foreach ($users as $user) {
                $data = [];
                
                if (in_array('name', $columns)) {
                    $data['name'] = $user['name'];
                }
                
                if (in_array('email', $columns)) {
                    $data['email'] = $user['email'];
                }
                
                if (in_array('code', $columns)) {
                    $data['code'] = $user['code'];
                }
                
                if (in_array('nik', $columns)) {
                    $data['nik'] = $user['nik'];
                }
                
                if (in_array('email_verified_at', $columns)) {
                    $data['email_verified_at'] = now();
                }
                
                if (in_array('password', $columns)) {
                    $data['password'] = Hash::make('password');
                }
                
                if (in_array('remember_token', $columns)) {
                    $data['remember_token'] = Str::random(10);
                }
                
                if (in_array('wa_number', $columns)) {
                    $data['wa_number'] = '08' . rand(1000000000, 9999999999);
                }
                
                if (in_array('dob', $columns)) {
                    $data['dob'] = Carbon::now()->subYears(rand(25, 45))->format('Y-m-d');
                }
                
                // Add join_date field since it's required
                if (in_array('join_date', $columns)) {
                    $data['join_date'] = Carbon::now()->subMonths(rand(1, 24))->format('Y-m-d');
                }
                
                if (in_array('created_by', $columns)) {
                    $data['created_by'] = 1; // Assume first user is created by ID 1 (maybe a system user)
                }
                
                // Set timestamps
                $data['created_at'] = Carbon::now()->subMonths(rand(1, 12));
                $data['updated_at'] = Carbon::now();
                
                User::create($data);
            }
            
            $this->command->info('Users created successfully!');
        }
    }

    /**
     * Create outlets if none exist
     */
    private function createOutletsIfNeeded()
    {
        if (Outlet::count() === 0) {
            $this->command->info('Creating outlets...');
            
            // Get the actual column names from the outlets table
            $columns = Schema::getColumnListing('outlets');
            $this->command->info('Available columns in outlets table: ' . implode(', ', $columns));
            
            $outlets = [
                [
                    'name' => 'AYO BUGAR Menteng',
                    'code' => 'AYO-MTG',
                ],
                [
                    'name' => 'AYO BUGAR Kemang',
                    'code' => 'AYO-KMG',
                ],
                [
                    'name' => 'AYO BUGAR BSD',
                    'code' => 'AYO-BSD',
                ],
            ];
            
            foreach ($outlets as $outlet) {
                // Only include attributes that actually exist in the table
                $filteredOutlet = array_intersect_key($outlet, array_flip($columns));
                Outlet::create($filteredOutlet);
            }
            
            $this->command->info('Outlets created successfully!');
        }
    }

    /**
     * Create card members if none exist
     */
    private function createCardMembersIfNeeded()
    {
        if (CardMember::count() === 0) {
            $this->command->info('Creating card members...');
            
            $outlets = Outlet::all();
            
            if ($outlets->isEmpty()) {
                $this->command->error('No outlets found. Cannot create card members.');
                return;
            }
            
            // Get users for user_id field
            $users = User::all();
            
            if ($users->isEmpty()) {
                $this->command->error('No users found. Cannot create card members.');
                return;
            }
            
            // Get the actual column names from the card_members table
            $columns = Schema::getColumnListing('card_members');
            $this->command->info('Available columns in card_members table: ' . implode(', ', $columns));
            
            $members = [
                ['name' => 'Budi Santoso', 'email' => 'budi@example.com', 'wa_number' => '081234567890', 'nik' => '3174010101900001'],
                ['name' => 'Ani Wijaya', 'email' => 'ani@example.com', 'wa_number' => '081234567891', 'nik' => '3174010101900002'],
                ['name' => 'Dedi Kurniawan', 'email' => 'dedi@example.com', 'wa_number' => '081234567892', 'nik' => '3174010101900003'],
                ['name' => 'Maya Putri', 'email' => 'maya@example.com', 'wa_number' => '081234567893', 'nik' => '3174010101900004'],
                ['name' => 'Eko Prasetyo', 'email' => 'eko@example.com', 'wa_number' => '081234567894', 'nik' => '3174010101900005'],
            ];
            
            foreach ($members as $index => $member) {
                // Assign to random outlet
                $outlet = $outlets->random();
                // Assign to random user
                $user = $users->random();
                
                // Prepare data based on actual database columns
                $data = [];
                
                // User ID is required (based on the error)
                if (in_array('user_id', $columns)) {
                    $data['user_id'] = $user->id;
                }
                
                if (in_array('outlet_id', $columns)) {
                    $data['outlet_id'] = $outlet->id;
                }
                
                if (in_array('dob', $columns)) {
                    $data['dob'] = Carbon::now()->subYears(rand(18, 60))->subDays(rand(1, 365));
                }
                
                if (in_array('nik', $columns)) {
                    $data['nik'] = $member['nik'];
                }
                
                if (in_array('email', $columns)) {
                    $data['email'] = $member['email'];
                }
                
                if (in_array('wa_number', $columns)) {
                    $data['wa_number'] = $member['wa_number'];
                }
                
                // Handle different naming conventions for card code/id
                if (in_array('card_code', $columns)) {
                    $outletCode = $outlet->code ?? 'AYO';
                    $data['card_code'] = $outletCode . '-' . str_pad($index + 1, 3, '0', STR_PAD_LEFT);
                }
                
                if (in_array('card_member_name', $columns)) {
                    $data['card_member_name'] = $member['name'];
                }
                
                if (in_array('effective_date', $columns)) {
                    $data['effective_date'] = Carbon::now()->subDays(rand(1, 60));
                }
                
                if (in_array('expired_date', $columns)) {
                    $effectiveDate = $data['effective_date'] ?? Carbon::now()->subDays(rand(1, 60));
                    $expiryDays = [30, 90, 180, 365]; // 1 month, 3 months, 6 months, 1 year
                    $expiryPeriod = $expiryDays[array_rand($expiryDays)];
                    $data['expired_date'] = (clone $effectiveDate)->addDays($expiryPeriod);
                }
                
                if (in_array('created_by', $columns)) {
                    $data['created_by'] = $users->random()->id;
                }
                
                // Set timestamps
                $data['created_at'] = Carbon::now()->subMonths(rand(1, 12));
                $data['updated_at'] = Carbon::now();
                
                // Create the card member
                CardMember::create($data);
            }
            
            $this->command->info('Card members created successfully!');
        }
    }
}
