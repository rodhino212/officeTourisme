<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agent extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'num_agent';
    protected $fillable = [
            'nom','prenom', 'mdp'
    ];

    
}
