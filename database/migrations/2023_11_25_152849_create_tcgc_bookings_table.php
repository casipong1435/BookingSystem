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
        Schema::create('tcgc_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('institute');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('item_id');
            $table->string('username');
            $table->text('activity');
            $table->string('chair');
            $table->string('table');

            //0 = pending, 1 = accepted admin, 2 = accepted staff, 3 = finish, 4 = rejected, 5 = finished
            $table->tinyInteger('status');
            $table->string('rostrum');
            $table->string('number_of_person');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tcgc_bookings');
    }
};
