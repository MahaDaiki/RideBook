<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admin';
    protected $fillable =[
        'Admin_id',
        'isHidden',

    ];
    public function user(){
        return $this->belongsTo(User::class,'Admin_id');
    }
}
