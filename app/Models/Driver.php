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
    return $this->belongsTo(Taxi::class, 'Taxi_id');
}
public function user()
{
    return $this->belongsTo(User::class, 'Driver_id');
}

}
