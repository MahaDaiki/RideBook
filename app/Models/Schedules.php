<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    use HasFactory;
    protected $table = 'schedule';

    protected $fillable = [
        'date',
    ];

    public function driverSchedules()
    {
        return $this->hasMany(DriverSchedules::class);
    }
}
