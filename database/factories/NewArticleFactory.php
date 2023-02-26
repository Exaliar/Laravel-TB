<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NewArticle>
 */
class NewArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realTextBetween(50, 70),
            'photo_path' => $this->faker->imageUrl(),
            'description' => $this->faker->realTextBetween(160, 600),
            'user_id' => User::all()->random()->id,
            'created_at' => now()
        ];
    }
}
