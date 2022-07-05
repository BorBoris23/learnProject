<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'commentText' => $this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'owner_id' => $this->faker->randomElement($array = array (2,3,4,5,6,7,8,9)),
            'article_id' => $this->faker->randomElement($array = array (2,3,4,5,6,7,8,9)),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
    }
}
