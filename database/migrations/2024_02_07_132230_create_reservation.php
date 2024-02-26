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
            $table->integer('Value');
            $table->string('Feedback');
            $table->unsignedBigInteger('passenger_id');
            $table->unsignedBigInteger('driver_schedule_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('passenger_id')
            ->references('id')
            ->on('passenger');
            $table->foreign('driver_schedule_id')
            ->references('id')
            ->on('driver_schedule');
          

           
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
