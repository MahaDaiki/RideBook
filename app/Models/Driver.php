<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'driver';
    protected $fillable = [
        'Driver_id',
        'Description',
        'Payment',
        'Taxi_id',
        'Route_id',
        'isAvailable',
        'isHidden',
        
    ];
    public function taxi()
{
    return $this->belongsTo(Taxi::class);
}
public function user()
{
    return $this->belongsTo(User::class, 'Driver_id');
}
public function routes()
{
    return $this->belongsTo(Routes::class, 'Route_id');
}
    public function driverSchedules()
    {
        return $this->hasMany(DriverSchedules::class);
    }

}
