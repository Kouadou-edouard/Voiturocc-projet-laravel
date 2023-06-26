<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Annonces extends Model
{
    use HasFactory, Searchable;
    
    protected $fillable =[

        'Immatriculation',
        'Marque',
        'Tarifs',
        'annoncesImg',
    ];
     
    public function toSearchableArray(){

    $rechercheTableau = [
        'Immatriculation' => $this-> Immatriculation,
        'Marque' => $this-> Marque,
    ];

    return $rechercheTableau;
   }
   

}
