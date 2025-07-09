<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class SupplierViewMyRequestsTest extends DuskTestCase
{
    /** @test */
    public function supplier_can_view_my_requests()
    {
        // Jalankan seeder
        $this->seed(\Database\Seeders\DuskDummyDataSeeder::class);

        // Ambil user dari seeder
        $supplier = User::where('email', 'supplier@example.com')->first();

        $this->browse(function (Browser $browser) use ($supplier) {
            $browser->loginAs($supplier)
                    ->visit('/thirdsidebar') // sesuaikan dengan route supplier
                    ->waitForText('My Requests', 10)
                    ->assertSee('Request ID')
                    // ->waitForText('Sidosermo 4 GG 12')
                    // ->assertSee('Sidosermo 4 GG 12') // alamat dari seeder
                    ->assertSee('waiting for decision') // status dari seeder
                    ->pause(1000)
                    // ->screenshot('view-requests')
                    ; // opsional
        });
    }
}


// namespace Tests\Browser;

// use Laravel\Dusk\Browser;
// use Tests\DuskTestCase;
// use App\Models\User;
// use Illuminate\Support\Facades\DB;

// class SupplierViewMyRequestsTest extends DuskTestCase
// {
//     /** @test */
//     public function supplier_can_view_my_requests()
//     {
//         // Create dummy supplier user if not exists
//         $supplier = User::firstOrCreate(
//             ['email' => 'supplier@example.com'],
//             [
//                 'name' => 'Supplier Dummy',
//                 'password' => bcrypt('password123'),
//                 'phone_number' => '08123456789',
//                 'role' => 'supplier',
//             ]
//         );

//         // Create dummy pickup request linked to supplier (if necessary)
//         DB::table('request_pickups')->insertOrIgnore([
//             'id' => 999,
//             'cust_email' => 'customer@example.com',
//             'datetime' => now()->format('Y-m-d H:i:s'),
//             'volume' => 25,
//             'address' => 'Jl. Dummy No.123',
//             'status' => 'waiting for decision',
//         ]);

//         $this->browse(function (Browser $browser) use ($supplier) {
//             $browser->loginAs($supplier)
//                     ->visit('/thirdsidebar') // sesuaikan dengan route supplier melihat request
//                     ->waitForText('My Requests', 10) // pastikan ada tulisan 'My Requests'
//                     ->assertSee('Request ID')
//                     ->assertSee('Customer')
//                     ->assertSee('Pickup Address')
//                     ->screenshot('supplier-view-my-requests'); // opsional: bukti screenshot
//         });
//     }
// }
