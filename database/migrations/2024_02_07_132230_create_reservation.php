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
        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->date('Date');
            $table->integer('Available_Seats');
            $table->integer('price');
            $table->boolean('isHidden')->default(0);
            $table->unsignedBigInteger('passenger_id');
            $table->unsignedBigInteger('schedule_id');
            $table->unsignedBigInteger('driver_id');
            $table->timestamps();
            $table->foreign('passenger_id')
            ->references('id')
            ->on('users')
            ->where('role', 'passenger');
            $table->foreign('schedule_id')
            ->references('id')
            ->on('schedule');
            $table->foreign('driver_id')
            ->references('id')
            ->on('driver');
            

           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation');
    }
};
