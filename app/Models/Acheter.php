<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acheter extends Model
{
    protected $table = 'acheter';
    protected $fillable = [
        'user_id',
        // 'adherent_id',
        'livre_id',
        // 'prix',
        // 'quantite',
        'date_achat',
        'status',
        'status_paye',
    ];
    public $timestamps = false;
}
