<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Opinion extends Model
{
    protected $fillable = ['user_id', 'livre_id', 'opinion'];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}