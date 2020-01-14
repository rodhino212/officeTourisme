<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'num_categorie';
    protected $fillable = [
        'nom',
    ];

}
