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
        Schema::create('item_lists', function (Blueprint $table) {
            $table->id();
            $table->string('item_id');
            $table->string('item_name');
            $table->tinyInteger('status');
            $table->string('item_type');
            $table->string('quantity')->nullable();
            $table->text('description')->nullable();
            $table->text('item_img')->nullable();
            $table->text('in_charge')->nullable();
            $table->tinyInteger('featured')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_lists');
    }
};
