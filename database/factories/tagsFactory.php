<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class tagsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name=$this->faker->unique()->word(20);

        return [
            'name'=>$name,
            'slug'=>Str::slug($name),
            'color'=>$this->faker->randomElement(['red','yellow','indigo','green','gray','purple','pink','black'])
        ];
    }
}
