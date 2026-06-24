<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blackliste extends Model
{
    use HasFactory;

    protected $table = 'blacklistes';

    protected $fillable = [
        'emprunt_id',
        'adherent_id',
        'status',
    ];

    protected $casts = [
        'emprunt_id'  => 'integer',
        'adherent_id' => 'integer',
    ];

    public function emprunt()
    {
        return $this->belongsTo(Emprunt::class);
    }

    public function adherent()
    {
        return $this->belongsTo(Adherent::class);
    }
}
