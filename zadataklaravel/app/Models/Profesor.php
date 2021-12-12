<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $table = 'profesori';

    public function prijave()
    {
        //profesor moze da se nalazi u vise prijava
        return $this->hasMany(Prijava::class);
    }
}
