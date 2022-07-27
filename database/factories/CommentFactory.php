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
            'owner_id' => $this->faker->numberBetween($min = 2, $max = 10),
            'article_id' => $this->faker->numberBetween($min = 1, $max = 50),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
    }
}
