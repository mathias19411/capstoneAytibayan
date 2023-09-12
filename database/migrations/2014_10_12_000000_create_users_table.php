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
            $table->string('first_name');
            // $table->string('username')->unique()->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('email')->unique()->nullable();;
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();;
            $table->string('photo')->nullable();
            $table->string('phone')->nullable();
            $table->string('primary_address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('zip')->nullable();
            $table->enum('role',['itstaff', 'project_coordinator', 'beneficiary'])->default('beneficiary');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
        

    }
};
