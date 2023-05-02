<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserDetails>
 */
class UserDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'favourite_simulator' => $this->faker->randomElement([
                'iRacing',
                'Assetto Corsa',
                'Assetto Corsa Competizione',
                'rFactor 2',
                'Project CARS 2',
                'F1 22'
            ]),
            'favourite_car_id' => $this->faker->numberBetween(1, 10),
            'favourite_track_id' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}