<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bon extends Model
{
    protected $table = 'bon';

    public function bons() {
        return $this->hasMany(Bon::class);
    }
}
