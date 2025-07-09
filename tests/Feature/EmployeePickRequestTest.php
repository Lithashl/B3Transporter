<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\RequestPickup;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeePickRequestTest extends TestCase
{
    // use RefreshDatabase;

    /** @test */
    public function employee_can_pick_request()
    {
        $this->seed(\Database\Seeders\DuskDummyDataSeeder::class);

        $employee = User::where('email', 'employee@example.com')->first();
        $this->assertNotNull($employee, 'Employee not found. Seeder mungkin gagal.');

        // Ambil request pickup
        $requestPickup = RequestPickup::where('status', 'waiting for decision')->first();
        $this->assertNotNull($requestPickup, 'Request pickup not found.');


        // Kirim POST request sebagai employee untuk pick request
        $response = $this->actingAs($employee)->post('/thirdsidebar', [
            'request_id' => $requestPickup->id,
            'pick' => 'Pick'
        ]);

        // Pastikan redirect
        $response->assertRedirect('/thirdsidebar');

        // Cek apakah data pickup tercatat
        $this->assertDatabaseHas('pickups', [
            'employee_email' => $employee->email,
        ]);

        // Cek status request sudah Picked
        $this->assertDatabaseHas('request_pickups', [
            'id' => $requestPickup->id,
            'status' => 'Picked',
        ]);
    }
}
