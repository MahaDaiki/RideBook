<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
    use HasFactory;
    protected $table = 'routes';
    protected $fillable = [
        'start_city_id',
        'destination_city_id',

    ];
    public function startCity()
    {
        return $this->belongsTo(Cities::class, 'start_city_id');
    }

    public function endCity()
    {
        return $this->belongsTo(Cities::class, 'destination_city_id');
    }
    public function drivers()
    {
        return $this->hasMany(Driver::class,'Route_id', 'id');
    }
}
