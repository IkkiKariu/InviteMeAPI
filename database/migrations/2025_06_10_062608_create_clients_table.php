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
        Schema::create('clients', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('first_name', length: 20);
            $table->string('last_name', length: 20)->nullable();
            $table->string('phone', length: 20)->unique();
            $table->string('email', length: 255)->nullable()->unique();
            $table->date('date_of_birth')->nullable();
            $table->uuid('status_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
