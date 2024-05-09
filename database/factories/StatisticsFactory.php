<?php

namespace Database\Factories;

use App\Models\Statistics;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatisticsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Statistics::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'games_played' => $this->faker->numberBetween(0, 100),
            'games_won' => $this->faker->numberBetween(0, 100),
            'games_lost' => $this->faker->numberBetween(0, 100),
        ];
    }
}
