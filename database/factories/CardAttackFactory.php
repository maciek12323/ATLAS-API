<?php

namespace Database\Factories;

use App\Models\CardAttack;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardAttackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CardAttack::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'element' => $this->faker->randomElement(['Fire', 'Water', 'Earth', 'Air']),
            'energyCost' => $this->faker->numberBetween(1, 5),
            'cardName' => $this->faker->words(3, true),
            'cardImage' => $this->faker->imageUrl(),
            'cardBasicDescription' => $this->faker->sentence,
            'cardGoldDescription' => $this->faker->sentence,
            'type' => $this->faker->randomElement(['Spell', 'Attack', 'Special']),
            'AttackLeft' => $this->faker->numberBetween(5, 15),
            'AttackFront' => $this->faker->numberBetween(10, 20),
            'AttackRight' => $this->faker->numberBetween(5, 15),
        ];
    }
}
