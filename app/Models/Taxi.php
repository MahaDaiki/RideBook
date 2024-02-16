<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxi extends Model
{
    use HasFactory;
    protected $table = 'taxi';
    protected $fillable = [
        'Vehicle_Platenumber',
        'Vehicle_Type',
        'Available_Seats',
        'isHidden',
    ];
    public function driver()
    {
        return $this->hasOne(Driver::class);
    }
}
