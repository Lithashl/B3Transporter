<?php


namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Support\Facades\Hash;

// class RequestPickupTest extends DuskTestCase
// {
//     public function test_user_can_request_pickup()
//     {
//         // Jalankan seeder dummy
//         $this->seed(\Database\Seeders\DuskDummyDataSeeder::class);

//         // Ambil user dari seeder
//         $user = User::where('email', 'supplier@example.com')->first();

//         $this->browse(function (Browser $browser) use ($user) {
//             $browser->visit('/login')
//                     ->loginAs($user)
//                     ->press('Sign In')
//                     ->pause(1000)
//                     ->assertPathIs('/dashboard'); // sesuaikan dengan route setelah login

//             $browser->visit('/requestpickup')
//                     ->waitFor('#request-pickup-header', 10)
//                     ->type('volume', '20')
//                     ->type('address', 'Jl. Mawar No. 123')
//                     ->script("document.querySelector('input[name=date]').value = '" . now()->addDays(2)->format('Y-m-d') . "';");

//             $browser->radio('time', '09:00')
//                     ->type('notes', 'Test pickup request via Dusk.')
//                     ->attach('upload', __DIR__ . '/test_img.jpg') // pastikan file ini ada
//                     ->press('Submit')
//                     ->pause(1000)
//                     ->acceptDialog()
//                     ->assertPathIs('/thirdsidebar'); // atau halaman redirect-mu
//         });
//     }
// }


// namespace Tests\Browser;

// use App\Models\User;
// use Illuminate\Support\Facades\Hash;
// use Laravel\Dusk\Browser;
// use Tests\DuskTestCase;
// use Illuminate\Http\UploadedFile;
// use Illuminate\Support\Facades\Storage;

class RequestPickupTest extends DuskTestCase
{
    public function test_user_can_request_pickup()
    {
        $this->seed(\Database\Seeders\DuskDummyDataSeeder::class);
        $user = User::where('email', 'supplier@example.com')->first();
        // Siapkan user dummy
        // $user = User::factory()->create([
        //     'email' => 'minyakabadi@example.com',
        //     'password' => Hash::make('password123'),
        // ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                    ->loginAs($user) // ⬅️ sesuaikan sesuai route
                    // ->waitForText('My Requests', 10)
                    ->press('Sign In')
                    // ->assertPathIs('/dashboard')
                    ->pause(1000)
                    ;
        });

        $this->browse(function (Browser $browser){
            $browser
                    // ->loginAs($user)
                    ->visit('/requestpickup')
                    ->waitFor('#request-pickup-header', 10) // tunggu form muncul
                    ->type('volume', '20')
                    ->type('address', 'Jl. Mawar No. 123')
                    ->script("document.querySelector('input[name=date]').value = '" . now()->addDays(2)->format('Y-m-d') . "';");

            $browser->radio('time', '09:00')
                    ->type('notes', 'Test pickup request via Dusk.')
                    ->attach('upload', __DIR__ . '/test_img.jpg') // pastikan kamu punya file test-image.jpg di folder ini
                    ->press('Submit')
                    ->pause(1000)
                    ->acceptDialog()
                    ->assertPathIs('/thirdsidebar');
        });
    }
}
