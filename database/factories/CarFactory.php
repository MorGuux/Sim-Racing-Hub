<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
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
                'Bentley Continental GT3 2018',
                'BMW M4 GT4 2019',
                'Audi R8 LMS 2020',
                'Aston Martin Vantage GT3 2017',
                'Porsche 911 GT3 R 2015',
                'Mercedes-AMG GT3 2019',
                'Ferrari 488 GT3 2020',
                'Lamborghini Huracán GT3 2021',
                'McLaren 720S GT3 2016',
                'Nissan GT-R Nismo GT3 2020'])
        ];
    }
}