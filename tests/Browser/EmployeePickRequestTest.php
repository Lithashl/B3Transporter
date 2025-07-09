<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\RequestPickup;

class EmployeePickRequestTest extends DuskTestCase
{
    /** @test */
    public function employee_can_pick_new_request()
    {
        // Pastikan seeder dijalankan
        $this->seed(\Database\Seeders\DuskDummyDataSeeder::class);

        // Ambil employee dan request dari seeder
        $employee = User::where('email', 'employee@example.com')->first();
        $request = RequestPickup::where('status', 'waiting for decision')
                    ->whereNull('pickup_id')
                    ->first();

        // Safety check
        $this->assertNotNull($employee, 'Employee not found from seeder');
        $this->assertNotNull($request, 'Request pickup not found from seeder');

        $this->browse(function (Browser $browser) use ($employee, $request) {
            $browser->loginAs($employee)
                    ->visit('/newrequest') // ubah sesuai rute kamu
                    // ->waitForText($request->address, 10)
                    ->press('Pick') // pastikan dusk selector ada
                    ->pause(1000)
                    // ->assertSee('assigned') // pastikan teks ini muncul setelah pick
                    // ->screenshot('employee-picked')
                    ;
        });
    }
}
