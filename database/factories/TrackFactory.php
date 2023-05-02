<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Track>
 */
class TrackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->randomElement([
                'Oulton Park',
                'Monza',
                'Spa-Francorchamps',
                'Nürburgring',
                'Barcelona',
                'Circuit de la Sarthe',
                'Paul Ricard',
                'Suzuka',
                'Monza',
                'Imola'
            ])
        ];
    }
}