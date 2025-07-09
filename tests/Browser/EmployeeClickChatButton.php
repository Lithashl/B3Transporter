<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\RequestPickup;

class EmployeeClickChatButton extends DuskTestCase
{
    /** @test */
    public function employee_can_chat_with_supplier()
    {
        // Jalankan seeder agar data tersedia
        $this->seed(\Database\Seeders\DuskDummyDataSeeder::class);

        // Ambil data dari seeder
        $employee = User::where('email', 'employee@example.com')->first();
        $request = RequestPickup::where('status', 'Picked')->first();

        // Safety check
        $this->assertNotNull($employee, 'Employee tidak ditemukan');
        $this->assertNotNull($request, 'Request pickup tidak ditemukan');

        $this->browse(function (Browser $browser) use ($employee, $request) {
            $browser->loginAs($employee)
                    ->visit('/thirdsidebar') // ubah sesuai route
                    // ->waitForText($request->address, 10)
                    ->press('chat')
                    ->pause(1000)
                    ->assertPathBeginsWith('/chat') 
                    ;
        });
    }
}
