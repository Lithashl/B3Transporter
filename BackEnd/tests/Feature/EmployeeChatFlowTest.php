<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\RequestPickup;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeChatFlowTest extends TestCase
{
    // use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\DuskDummyDataSeeder::class);
    }

    public function test_employee_can_access_chat_and_send_message()
    {
        // ✅ Ambil user dan request pickup dari seeder
        $employee = User::where('email', 'employee@example.com')->first();
        $supplier = User::where('email', 'supplier@example.com')->first();

        $requestPickup = RequestPickup::where('status', 'Picked')
            ->where('cust_email', $employee->email)
            ->first();

        $this->assertNotNull($employee);
        $this->assertNotNull($requestPickup);

        // ✅ Employee akses halaman chat
        $response = $this->actingAs($employee)->get('/chat?request_pickup_id=' . $requestPickup->id . '&cust_name=' . urlencode($supplier->name));
        // $response->assertStatus(200);
        $response->assertSee('Chat with Customer');
        $response->assertSee($requestPickup->address);

        // ✅ Employee kirim pesan melalui GET /chat/send
        $message = 'Pesan test dari employee';
        $sendResponse = $this->actingAs($employee)->get('/chat/send?request_pickup_id=' . $requestPickup->id . '&message=' . urlencode($message) . '&role=employee');
        $sendResponse->assertStatus(200);

        // ✅ Pastikan pesan masuk ke database
        $this->assertDatabaseHas('chats', [
            'request_pickup_id' => $requestPickup->id,
            'message' => $message,
            'role' => 'employee',
        ]);
    }
}
