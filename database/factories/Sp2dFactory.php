<?php

namespace Database\Factories;

use App\Models\Sp2d;
use Illuminate\Database\Eloquent\Factories\Factory;

class Sp2dFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sp2d::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'no_sp2D' => '00' . $this->faker->randomNumber(2, true) . '/SP2D'
        ];
    }
}
