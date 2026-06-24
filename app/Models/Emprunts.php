<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Emprunts extends Model
{
    protected  $table = 'emprunts';
    protected  $fillable =[ 
    'livre','livre_id' ,'adherent' ,'date_emprunt' ,'date_retour_prevue' ,'date_retour_effective','status','retard','user_id'];
    public $timestamps = false;
    public function livre()
    {
        return $this->belongsTo(Livres::class);
    }
}