<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VrstaPrijaveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'naziv'=>$this->faker->word(),
        ];
    }
}
