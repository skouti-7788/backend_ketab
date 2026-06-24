<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telecharger extends Model
{
    protected $table = 'telecharger';
    protected $fillable = [
        'user_id',
        // 'adherent_id',
        'livre_id',
        // 'fichier',
        // 'format',
        'date_telechargement',
        // 'download_count',
        'status',
    ];
    public $timestamps = false;
}
