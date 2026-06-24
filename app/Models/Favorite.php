<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['user_id', 'livre_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function livre() {
        return $this->belongsTo(Livres::class);
    }
}
