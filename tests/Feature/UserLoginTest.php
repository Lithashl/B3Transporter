<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Database\Seeders\DuskDummyDataSeeder; // Pastikan namespace-nya benar
use App\Models\User;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function supplier_can_login_and_access_my_requests_page()
    {
        // Jalankan seeder
        $this->seed(DuskDummyDataSeeder::class);

        // Ambil user yang sudah disediakan di seeder
        $supplier = User::where('email', 'supplier@example.com')->first();

        // Pastikan user ditemukan
        $this->assertNotNull($supplier);

        // Simulasi login
        $response = $this->post('/login', [
            'email' => 'supplier@example.com',
            'password' => 'password123', // sesuaikan dengan password di seeder
        ]);

        $response->assertRedirect('/dashboard'); // sesuaikan dengan route setelah login

        // Akses halaman setelah login
        $response = $this->actingAs($supplier)->get('/dashboard');

        $response->assertStatus(200);
        // $response->assertSee('My Requests'); // atau text lain di halaman itu
    }
}
