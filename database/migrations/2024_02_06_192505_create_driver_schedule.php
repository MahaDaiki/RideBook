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
        Schema::create('driver_schedule', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('schedule_id');
            $table->enum('isDone', ['Done','Waiting' , 'cancelled'])->default('Waiting'); 
            $table->foreign('driver_id')
            ->references('id')
            ->on('driver');
            $table->foreign('schedule_id')
            ->references('id')
            ->on('schedule');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_schedule');
    }
};
