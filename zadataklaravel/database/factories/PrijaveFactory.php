<?php

namespace Database\Factories;

use App\Models\Profesor;
use App\Models\VrstaPrijave;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PrijaveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'kurs'=>$this->faker->word(),
                'cena'=>$this->faker->numberBetween($min = 100, $max = 350) ,
                'user_id'=>User::factory(),
                'vrstaprijave_id'=>VrstaPrijave::factory(),
                'profesor_id'=>Profesor::factory(),
        ];
    }
}
