<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class History extends Model
{   protected $table = 'history';
    protected $fillable = [ 
        'nom','email','livre','rate','livre_id','user_id',
        // 'favorie'
    ];
    public $timestamps = false;
}