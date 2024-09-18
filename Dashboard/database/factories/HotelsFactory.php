<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'stars' => $this->faker->numberBetween(1, 5),
            'contact_number' => $this->faker->phoneNumber,
            'hotel_image' => $this->faker->imageUrl(),
        ];
    }
}
