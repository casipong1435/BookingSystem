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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // 0 = client, 1 = admin, 2 = tourism, 3 = tcgc
            $table->tinyInteger('role')->default(0);
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->tinyInteger('usertype')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('plain_pass');
            $table->tinyInteger('status')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};