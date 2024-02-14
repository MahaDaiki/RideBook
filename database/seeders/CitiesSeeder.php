<?php

namespace Database\Seeders;

use App\Models\Cities;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['name' => 'Casablanca'],
            ['name' => 'Fès'],
            ['name' => 'Tangier'],
            ['name' => 'Marrakech'],
            ['name' => 'Sale'],
            ['name' => 'Rabat'],
            ['name' => 'Meknès'],
            ['name' => 'Kenitra'],
            ['name' => 'Agadir'],
            ['name' => 'Tétouan'],
            ['name' => 'Temara'],
            ['name' => 'Safi'],
            ['name' => 'Khénifra'],
            ['name' => 'Mohammedia'],
            ['name' => 'Kouribga'],
            ['name' => 'El Jadida'],
            ['name' => 'Béni Mellal'],
            ['name' => 'Ait Melloul'],
            ['name' => 'Nador'],
            ['name' => 'Taza'],
            ['name' => 'Settat'],
            ['name' => 'Barrechid'],
            ['name' => 'Al Khmissat'],
            ['name' => 'Inezgane'],
            ['name' => 'Guelmim'],
            ['name' => 'Bouskoura'],
            ['name' => 'Al Fqih Ben Çalah'],
            ['name' => 'Ben Slimane'],
            ['name' => 'Errachidia'],
            ['name' => 'Guercif'],
            ['name' => 'Ben Guerir'],
            ['name' => 'Sidi Qacem'],
            ['name' => 'Moulay Abdallah'],
            ['name' => 'Youssoufia'],
            ['name' => 'Al Hoceïma'],
            ['name' => 'Sidi Bennour'],
            ['name' => 'Midelt'],
            ['name' => 'Azrou'],
            ['name' => 'Azemmour'],
            ['name' => 'Temsia'],
            ['name' => 'Zagora'],
        ];

        foreach ($cities as $cityData) {
            Cities::create($cityData);}
    }
}
