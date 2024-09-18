<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rooms>
 */
class RoomsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hotel_id' => $this->faker->numberBetween(1, 10),
           'room_number' => $this->faker->randomDigit(),
            'room_type' => $this->faker->randomElement(['Single', 'Double', 'Suite', 'Deluxe']),
            'room_price' =>$this->faker->numberBetween(50.00, 500.00),
            'room_image'=>$this->faker->imageUrl(),
            'room_description'=>$this->faker->text(),
            'room_status' => $this->faker->randomElement(['available', 'unavailable']), // Match enum values
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
