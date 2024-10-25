<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peserta>
 */
class PesertaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nip' => $this->faker->unique()->randomNumber(5),
            'name' => $this->faker->name,
            'bag' => $this->faker->word,
            'subbag' => $this->faker->word,
            'position' => $this->faker->word,
        ];
    }
}
