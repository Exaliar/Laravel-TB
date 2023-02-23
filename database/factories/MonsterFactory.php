<?php

namespace Database\Factories;

use App\Config\UnitCategoryTypeConfig;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Monster>
 */
class MonsterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lvl' => $this->faker->numberBetween(0, 7),
            'name' => $this->faker->name(),
            'first_type' => $this->faker->randomElement(UnitCategoryTypeConfig::TYPES),
            'second_type' => $this->faker->randomElement(UnitCategoryTypeConfig::TYPES),
            'third_type' => $this->faker->randomElement(UnitCategoryTypeConfig::TYPES),
            'strength' => $this->faker->numberBetween(1, 7000),
            'health' => $this->faker->numberBetween(1, 7000),
            'first_bonus'  => $this->faker->numberBetween(1, 1200),
            'first_bonus_who' => $this->faker->randomElement(UnitCategoryTypeConfig::TYPES),
            'second_bonus' => $this->faker->numberBetween(1, 1200),
            'second_bonus_who' => $this->faker->randomElement(UnitCategoryTypeConfig::TYPES),
            'third_bonus' => $this->faker->numberBetween(1, 1200),
            'third_bonus_who' => $this->faker->randomElement(UnitCategoryTypeConfig::TYPES),
            'graphics' => $this->faker->url()
        ];
    }
}
