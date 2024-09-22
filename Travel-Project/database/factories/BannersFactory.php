<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banners>
 */
class BannersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'room_id' => $this->faker->numberBetween(1, 100),
            'discount' => $this->faker->numberBetween(1, 100),
        ];
    }
}
