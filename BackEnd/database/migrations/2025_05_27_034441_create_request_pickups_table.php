<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('request_pickups', function (Blueprint $table) {
            $table->id();
            $table->string('cust_email');
            $table->unsignedBigInteger('pickup_id')->nullable();
            $table->string('volume');
            $table->string('address');
            $table->string('notes');
            $table->string('url_img');
            $table->datetime('datetime');
            $table->string('status');
            $table->timestamps();
        });
        Schema::table('request_pickups', function (Blueprint $table) {
            $table->foreign('cust_email')->references('email')->on('users')-> onDelete('cascade');
            $table->foreign('pickup_id')->references('id')->on('pickups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_pickups');
    }
};
