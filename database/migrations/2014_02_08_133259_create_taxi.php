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
        Schema::create('taxi', function (Blueprint $table) {
            $table->id();
            $table->string('Vehicle_Platenumber');
            $table->string('Vehicle_Type');
            $table->integer('Available_Seats')->default(6);
            $table->boolean('isHidden')->default(0);
            $table->timestamps(); 
         
           

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxi');
    }
};