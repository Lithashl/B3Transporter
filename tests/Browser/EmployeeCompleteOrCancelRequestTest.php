<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\RequestPickup;
use Illuminate\Support\Carbon;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EmployeeCompleteOrCancelRequestTest extends DuskTestCase
{
    // public function test_employee_can_complete_request()
    // {
    //     // Jalankan seeder
    //     $this->seed(\Database\Seeders\DuskDummyDataSeeder::class);

    //     // Ambil data dari seeder
    //     $employee = User::where('role', 'employee')->first();
    //     $request = RequestPickup::where('status', 'Picked')->first();

    //     // Pastikan data tersedia
    //     $this->assertNotNull($employee, 'Employee not found from seeder');
    //     $this->assertNotNull($request, 'Request pickup not found from seeder');

    //     $this->browse(function (Browser $browser) use ($employee, $request) {
    //         $browser->loginAs($employee)
    //             ->visit('/thirdsidebar')
    //             ->waitForText('My Pickup', 10)
    //             ->assertSee($request->address)
    //             // ->assertSee('Picked') // konfirmasi request muncul
    //             ->press('Complete') // pastikan value tombolnya "Complete"
    //             ->pause(1000)
    //             ->acceptDialog()
    //             ->assertPathIs('/thirdsidebar') // asumsinya redirect tetap di thirdsidebar
    //             ->assertSee('Completed')
    //             ->pause(1000)
    //             ; // status setelah berhasil
    //     });
    // }
    public function test_employee_can_cancel_request()
{
    $this->seed(\Database\Seeders\DuskDummyDataSeeder::class);

    $employee = User::where('email', 'employee@example.com')->first();
    $request = RequestPickup::where('status', 'Picked')->first();

    $this->assertNotNull($employee);
    $this->assertNotNull($request);

    $this->browse(function (Browser $browser) use ($employee, $request) {
        $browser->loginAs($employee)
                ->visit('/thirdsidebar')
                // ->waitForText('Picked', 10)
                ->press('Cancel') // pastikan ada Dusk selector
                ->pause(5000)
                ->acceptDialog()
                ->visit('/thirdsidebar')
                // // ->waitForText('waiting for decision', 10)
                // ->assertSee('waiting for decision')
                // ->assertSee($request->address)
                ;
    });
}
}
