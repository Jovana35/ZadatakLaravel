<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prijava;

class VrstaPrijave extends Model
{
    use HasFactory;

    protected $table = 'vrstaprijave';
    //vrsta prijave this moze da ima vise prijava
    public function posts() {
        return $this->hasMany(Prijava::class);
    }
}
