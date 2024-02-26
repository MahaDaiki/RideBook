<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverSchedules extends Model
{
    use HasFactory;
    protected $table = 'driver_schedule';

    protected $fillable = [
        'driver_id',
        'schedule_id',
        'isDone',
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedules::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservations::class);
    }

}
