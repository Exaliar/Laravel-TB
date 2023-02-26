<?php

namespace Database\Factories;

use App\Config\MonstersSquadTypeConfig;
use App\Config\MonstersTypeConfig;
use App\Models\Monster;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MonsterSquad>
 */
class MonsterSquadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'squad_type' => $this->faker->randomElement(MonstersSquadTypeConfig::TYPES),
            'lvl' => $this->faker->numberBetween($min = 1, $max = 50),
            'type' => $this->faker->randomElement(MonstersTypeConfig::TYPES),
            'first_monster' => Monster::all()->random()->id,
            'first_monster_count' => $this->faker->numberBetween($min = 1, $max = 7000),
            'second_monster' => Monster::all()->random()->id,
            'second_monster_count' => $this->faker->numberBetween($min = 1, $max = 7000),
            'third_monster' => Monster::all()->random()->id,
            'third_monster_count' => $this->faker->numberBetween($min = 1, $max = 7000),
            'fourth_monster' => Monster::all()->random()->id,
            'fourth_monster_count' => $this->faker->numberBetween($min = 1, $max = 7000),
            'fifth_monster' => Monster::all()->random()->id,
            'fifth_monster_count' => $this->faker->numberBetween($min = 1, $max = 7000),
            'sixth_monster' => Monster::all()->random()->id,
            'sixth_monster_count' => $this->faker->numberBetween($min = 1, $max = 7000),
        ];
    }
}
