<?php

namespace Database\Factories;

use App\Models\Cities;
use App\Models\Route;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoutesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startCityId = Cities::inRandomOrder()->first()->id;
        $destinationCityId = Cities::where('id', '!=', $startCityId)->inRandomOrder()->first()->id;

        return [
            'start_city_id' => $startCityId,
            'destination_city_id' => $destinationCityId,
            
        ];
    }
}
