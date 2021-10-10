<?php

namespace Database\Factories;

use App\Models\Spp;
use Illuminate\Database\Eloquent\Factories\Factory;

class SppFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Spp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'no_spp' => '00' . $this->faker->randomNumber(2, true) . '/SPP'
        ];
    }
}
