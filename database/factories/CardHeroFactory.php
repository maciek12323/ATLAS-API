<?php

namespace Database\Factories;

use App\Models\CardHero;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardHeroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CardHero::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'heroImage' => $this->faker->imageUrl(),
            'talentDescription' => $this->faker->sentence,
            'talentCooldown' => $this->faker->numberBetween(1, 10),
            'talentType' => $this->faker->randomElement(['passive', 'active']),
            'talentValue' => $this->faker->numberBetween(5, 20),
        ];
    }
}
