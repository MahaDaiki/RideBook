<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservations extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'reservation';

    protected $fillable = [
        'Date',
        'Available_Seats',
        'price',
        'Value',
        'Feedback',
        'passenger_id',
        'driver_schedule_id',
    ];

    // Define relationships
    public function passenger()
    {
        return $this->belongsTo(Passenger::class, 'passenger_id');
    }

    public function driverSchedule()
    {
        return $this->belongsTo(DriverSchedules::class, 'driver_schedule_id');
    }
}
