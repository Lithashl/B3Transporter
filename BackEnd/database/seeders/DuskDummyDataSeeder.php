<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Pickup;
use App\Models\RequestPickup;
use Carbon\Carbon;

class DuskDummyDataSeeder extends Seeder
{
    public function run(): void
    {
        //dummy admin login
        $admin = User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Miss Carole Rippin',
            'password' => bcrypt('password123'),
            'phone_number' => '085512341234',
            'role' => 'admin',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        // dummy supplier login
        $supplier = User::firstOrCreate([
            'email' => 'supplier@example.com',
        ], [
            'name' => 'PT Minyak Abadi',
            'password' => bcrypt('password123'),
            'phone_number' => '08123456789',
            'role' => 'customer',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        //dummy employee login
        $employee = User::firstOrCreate([
            'email' => 'employee@example.com',
        ], [
            'name' => 'Miss Carole Rippin',
            'password' => bcrypt('password123'),
            'phone_number' => '085512341234',
            'role' => 'employee',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        $pickup = Pickup::firstOrCreate([
            'employee_email' => $employee->email
        ]);

        // Create request pickup
        RequestPickup::firstOrCreate([
            'cust_email' => $supplier->email,
            'datetime' => Carbon::now()->format('Y-m-d H:i:s'),
        ], [
            'volume' => 25,
            'address' => 'Sidosermo 4 GG 12',
            'status' => 'waiting for decision',
            'pickup_id' => null,
            'notes' => 'Catatan testing Dusk',
            'url_img' => 'test-img.jpg' // pastikan nama file valid kalau dicek di view
        ]);

        
        // $employee = User::where('role', 'employee')->first();
        RequestPickup::firstOrCreate([
            'cust_email' => $employee->email,
            'datetime' => Carbon::now()->format('Y-m-d H:i:s'),
        ], [
            'volume' => 25,
            'address' => 'Sidosermo 4 GG 12',
            'status' => 'Picked',
            'pickup_id' => $pickup->id, // atau ID, tergantung implementasi kamu
            'notes' => 'Catatan testing Dusk',
            'url_img' => 'test-img.jpg'
        ]);

    }
}
