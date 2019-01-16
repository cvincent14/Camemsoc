<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $table = 'fournisseur';

    public function fournisseur() {
        return $this->belongsTo(Fournisseur::class);
    }
}
