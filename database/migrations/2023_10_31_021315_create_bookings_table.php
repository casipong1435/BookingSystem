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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('id');
            $table->string('item_id');
            $table->string('price_id');
            $table->string('username');
            $table->string('item_type');
            $table->text('purpose');

            // 0 = pending, 1 = accepted admin, 2 = approved, 3 rejected
            $table->tinyInteger('status');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
