<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Showlivres extends Model
{   protected $table = 'showlivres';
    protected $fillable = [ 
         'livre_id','user_id',
    ];
    public $timestamps = false;
}

