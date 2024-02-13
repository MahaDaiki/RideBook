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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('start_city_id');
            $table->unsignedBigInteger('destination_city_id');
            $table->timestamps();
            $table->foreign('start_city_id')
            ->references('id')
            ->on('cities')
            ->onDelete('cascade');
             $table->foreign('destination_city_id')
            ->references('id')
            ->on('cities')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
