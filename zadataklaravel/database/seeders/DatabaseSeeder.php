<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use App\Models\Prijave;
use App\Models\Profesor;
use App\Models\VrstaPrijave;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Prijave::truncate();
        User::truncate();
        VrstaPrijave::truncate();
        Profesor::truncate();

        //bice napravljeno 10 korisnika i oni ce biti ubaceni u bazu
        //User::factory(10)->create();
        
        Prijave::factory(5)->create();
    }
}
