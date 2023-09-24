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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('project_coordinator_id')->nullable();
            $table->string('program_name')->nullable();
            $table->string('location')->nullable();
            $table->string('email')->nullable();
            $table->integer('contact')->nullable();
            $table->text('description')->nullable();
            $table->text('quiry')->nullable();
            $table->text('requirements')->nullable();
            $table->string('image')->nullable();
            $table->string('table_name')->nullable();
            $table->integer('number_columns')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progams');
    }
};
