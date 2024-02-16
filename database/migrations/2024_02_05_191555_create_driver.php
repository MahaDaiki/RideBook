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
        Schema::create('driver', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('driver_id');
            $table->string('Description');
            $table->enum('payment', ['card', 'cash']);
            $table->unsignedBigInteger('taxi_id');
            $table->unsignedBigInteger('route_id')->nullable();
            $table->enum('isAvailable', ['Available', 'unavailable', 'Driving'])->default('Available'); 
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('driver_id')
            ->references('id')
            ->on('users')
            ->where('role', 'driver')
            ->onDelete('cascade');
$table->foreign('taxi_id')
            ->references('id')
            ->on('taxi')
            ->onDelete('cascade');
            $table->foreign('route_id')
            ->references('id')
            ->on('routes');
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver');
    }
};
