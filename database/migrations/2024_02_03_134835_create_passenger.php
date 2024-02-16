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
        Schema::create('passenger', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('passenger_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('passenger_id')
            ->references('id')
            ->on('users')
            ->where('role', 'passenger')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passenger');
    }
};
