<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Passenger extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'passenger';
    protected $fillable =[
        'passenger_id',
        'isHidden',

    ];
    public function user(){
        return $this->belongsTo(User::class,'passenger_id');
    }
    public function reservations()
    {
        return $this->hasMany(Reservations::class);
    }
}
