<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    protected $fillable = ['livre_id', 'description'];

    public function livre()
    {
        return $this->belongsTo(Livres::class);
    }
}