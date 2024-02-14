<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;
    protected $table = 'passenger';
    protected $fillable =[
        'passenger_id',
        'isHidden',

    ];
    public function user(){
        return $this->belongsTo(User::class,'passenger_id');
    }
}
