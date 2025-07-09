<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Models\User;

class SupplierRequestPickupTest extends TestCase
{
    // use RefreshDatabase;

    /** @test */
    public function supplier_can_submit_pickup_request()
    {
        $this->seed(\Database\Seeders\DuskDummyDataSeeder::class);
        $user = User::where('email', 'supplier@example.com')->first();
        

        $this->assertNotNull($user);

        $this->actingAs($user);

        Storage::fake('public');

        $response = $this->actingAs($user)->post('/requestpickup', [
            'email' => $user->email,
            'volume' => 30,
            'address' => 'Jl. Cemara No. 9',
            'notes' => 'Request dari Feature Test',
            'date' => '2025-07-04',
            'time' => '10:00',
            'upload' => UploadedFile::fake()->image('test_img.jpg'), // harus 'upload'
        ]);
        

        $response->assertRedirect('/thirdsidebar');
        $response = $this->actingAs($user)->get('/thirdsidebar');

        $this->assertDatabaseHas('request_pickups', [
            'cust_email' => $user->email,
            'address' => 'Jl. Cemara No. 9',
        ]);
    }
}
