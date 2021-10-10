<?php

namespace Database\Factories;

use App\Models\Spm;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpmFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Spm::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'no_spm' => '00' . $this->faker->randomNumber(2, true) . '/SPM'
        ];
    }
}
