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
        Schema::create('progams', function (Blueprint $table) {
            $table->id();
            $table->string('project_coordinator');
            $table->string('program');
            $table->string('location');
            $table->string('email');
            $table->integer('contact');
            $table->text('description');
            $table->text('quiry');
            $table->text('requirements');
            $table->string('image');
            $table->string('table_name');
            $table->integer('number_columns');
            $table->string('image');

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
