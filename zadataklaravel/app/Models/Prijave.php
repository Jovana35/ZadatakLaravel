<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prijave extends Model
{
    use HasFactory;

    protected $fillable = [
        'kurs',
        'cena',
        'vrstaprijave_id',
        'profesor_id',
        'user_id'
    ]; 

    protected $table = 'prijave';
    public function vrstaprijave()
    {
        //prijava pripada samo jednoj vrsti prijave
        return $this->belongsTo(VrstaPrijave::class);
    }

    public function user()
    {
        //prijava pripada samo jednom korisniku
        return $this->belongsTo(User::class);
    }

    public function profesor()
    {
        //prijava pripada samo jednom profesoru
        return $this->belongsTo(Profesor::class);
    }
}
