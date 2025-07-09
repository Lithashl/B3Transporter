<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SupplierViewPickupHistoryTest extends DuskTestCase
{
    /** @test */
    public function supplier_can_view_pickup_history()
    {
        // Seed data dummy (supplier & request history)
        $this->seed(\Database\Seeders\DuskDummyDataSeeder::class);

        $supplier = User::where('email', 'supplier@example.com')->first();

        $this->browse(function (Browser $browser) use ($supplier) {
            $browser->loginAs($supplier)
                    ->visit('/pickuphistory') // ganti kalau beda
                    ->waitForText('Pickup History', 10)
                    ->assertSee('Pickup History')
                    // ->assertSee('Jl. Mawar No. 456') // alamat dari seeder
                    // ->assertSee('completed')        // status dari seeder
                    // ->screenshot('pickup-history-page')
                    ;
        });
    }
}
