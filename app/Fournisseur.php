<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $table = 'fournisseur';

    public function bons()
    {
        return $this->hasMany('App\Bon');
    }

}
