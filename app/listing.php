<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class listing extends Model
{
    protected $fillable = [
        'nom', 'categorie', 'addresse', 'prix', 'ref', 'louer', 'temps_location',
    ];
}
