<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use Database\Seeders\DuskDummyDataSeeder;
use Database\Seeders\SupplierSeeder; // ⬅️ pastikan ini sesuai dengan lokasi seeder-mu
use Illuminate\Support\Facades\Hash;

class LoginTest extends DuskTestCase
{
    /** @test */
    public function test_user_can_login()
    {
        // Seed user dummy (supplier@example.com)
        $this->artisan('db:seed', ['--class' => DuskDummyDataSeeder::class]);

        // Ambil user dari database
        $user = User::where('email', 'employee@example.com')->first();

        // Jalankan test browser
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                    ->loginAs($user) // ⬅️ sesuaikan sesuai route
                    // ->waitForText('My Requests', 10)
                    ->press('Sign In')
                    // ->assertPathIs('/dashboard')
                    ->pause(1000)
                    ;
        });
    }
}


// namespace Tests\Browser;

// use Laravel\Dusk\Browser;
// use Tests\DuskTestCase;
// use App\Models\User;
// use Database\Seeders\SupplierSeeder;
// use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;

// class LoginTest extends DuskTestCase
// {
//     public function test_user_can_login()
//     {
//         $this->browse(function (Browser $browser) {
//             // Ambil akun dummy yang sudah ada
//             $this->seed(LoginTest::class);
//             $user = User::where('email', 'supplier@example.com')->first();

//             // Login langsung sebagai user tersebut
//             $browser->loginAs($user)
//                     ->visit('/supplier/my-requests') // sesuaikan dengan route kamu
//                     ->waitForText('My Requests', 10) // pastikan ada teks ini di halaman
//                     ->assertSee('My Requests');
//         });
//         // // Siapkan user dummy
//         // $user = User::factory()->create([
//         //     'email' => 'minyakabadi@example.com',
//         //     'password' => Hash::make('password123'),
//         // ]);

//         // $this->browse(function (Browser $browser) use ($user) {
//         //     $browser->visit('/login')
//         //             ->type('email', $user->email)
//         //             ->type('password', 'password123')
//         //             ->press('Sign In')
//         //             ->pause(1000)
//         //             ->assertPathIs('/dashboard'); // sesuaikan dengan redirect login
//         // });
//     }
// }
