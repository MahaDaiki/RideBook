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
        Schema::create('rating', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('passenger_id');
            $table->unsignedBigInteger('reservation_id');
            $table->integer('Value');
            $table->string('Feedback');
            $table->timestamps();

            $table->foreign('passenger_id')
            ->references('id')
            ->on('users')
            ->where('role', 'passenger');

            $table->foreign('reservation_id')
            ->references('id')
            ->on('reservation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rating');
    }
};
