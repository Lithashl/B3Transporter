<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SupplierRegisterTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function supplier_can_register_successfully()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->waitFor('#register-header', 10)
                    ->type('name', 'Lee Know Company')
                    ->type('email', 'lino@example.com')
                    ->type('password', 'password123')
                    ->type('password_confirmation', 'password123')
                    ->type('phone_number', '08123456789')
                    ->press('Sign Up')
                    ->pause(1000)
                    ->assertPathIs('/dashboard');

        });
    }
}
