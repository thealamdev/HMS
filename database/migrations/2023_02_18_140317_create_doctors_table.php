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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('available_date');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('title');
            $table->string('email');
            $table->string('phone');
            $table->string('degree');
            $table->string('experience');
            $table->string('fees');
            $table->string('photo');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
