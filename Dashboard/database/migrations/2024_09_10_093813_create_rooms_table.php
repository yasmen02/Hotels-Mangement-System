<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Rooms;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained('hotels')->onDelete('cascade');
            $table->integer('room_number');
            $table->string('room_type');
            $table->string('room_description');
            $table->string('room_image')->nullable();
            $table->decimal('room_price', 8, 2);
            $table->enum('room_status', ['available', 'unavailable'])->default('available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
