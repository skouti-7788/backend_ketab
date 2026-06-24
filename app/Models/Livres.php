<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Description;

class Livres extends Model
{   protected $table = 'livres';
    protected $fillable = [
       'title', 'author','image', 'category', 'annee','pages','fileSize','extension',
       'creationDate','book_rank','prix','showLiver', 'qte', 'disponibilite', 'status',
        'pdf_url' ,'is_free','download_link'
    ];
    public $timestamps = false;
    public function description()
{
    return $this->hasOne(Description::class);
}
}