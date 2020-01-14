<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_point';
    protected $fillable = [
        'coordonnees','nom','ville', 'description','num_agent','date_saisie','num_categorie'
    ];

    
}
