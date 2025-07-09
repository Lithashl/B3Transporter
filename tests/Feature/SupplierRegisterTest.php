<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SupplierRegisterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function supplier_can_register(): void
    {
        $response = $this->post('/register', [
            'name' => 'PT Minyak Abadi',
            'email' => 'minyakabadi@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'phone_number' => '08123456789', // disesuaikan dengan controller
        ]);

        $response->assertStatus(302); // Redirect setelah sukses register
        $response->assertRedirect('/login'); // Ubah jika diarahkan ke /dashboard
        $this->assertDatabaseHas('users', [
            'email' => 'minyakabadi@example.com',
        ]);
    }

    /** @test */
    public function register_page_can_be_accessed(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    /** @test */
    public function registration_fails_with_missing_fields(): void
    {
        $response = $this->post('/register', []);

        $response->assertSessionHasErrors([
            'name', 'email', 'password', 'phone_number' // disesuaikan
        ]);
    }
}
