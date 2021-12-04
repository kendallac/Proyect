<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\categories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class postFactory extends Factory
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
            'name' =>$name,
            'slug'=>Str::slug($name),
            'extract'=>$this->faker->text(250),
            'body'=>$this->faker->text(2000),
            'status'=>$this->faker->randomElement([1,2]),
            'category_id'=>categories::all()->random()->id,
            'user_id'=>User::all()->random()->id,
        ];
    }
}
