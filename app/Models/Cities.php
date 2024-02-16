<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $fillable = [
        'name',
    ];
    public function startingRoutes()
    {
        return $this->hasMany(Routes::class, 'start_city_id');
    }

    public function destinationRoutes()
    {
        return $this->hasMany(Routes::class, 'destination_city_id');
    }

}
