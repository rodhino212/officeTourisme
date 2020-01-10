<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = [
        'nom', 'ville', 'description','num_agent','date_saisie','num_categorie'
    ];
}
