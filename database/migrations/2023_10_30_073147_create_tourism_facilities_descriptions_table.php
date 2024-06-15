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
        Schema::create('tourism_facilities_descriptions', function (Blueprint $table) {
            $table->id();
            $table->string('item_id');
            $table->string('item_name');
            $table->string('purpose')->nullable();
            $table->string('time')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('price_description')->nullable();
            $table->string('price')->nullable();
            $table->string('aircon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tourism_facilities_descriptions');
    }
};
