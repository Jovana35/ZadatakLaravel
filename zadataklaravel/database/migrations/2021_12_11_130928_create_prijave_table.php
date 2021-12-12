<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrijaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prijave', function (Blueprint $table) {
            $table->id();
            $table->string('kurs');
            $table->string('cena');
            $table->timestamps();
            //ovo je spoljni kljuc ka tabeli VrstaPrijave
            $table->foreignId('vrstaprijave_id');
            //ovo je spoljni kljuc ka tabeli User
            $table->foreignId('user_id');
            //ovo je spoljni kljuc ka tabeli Profesor
            $table->foreignId('profesor_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prijave');
    }
}
