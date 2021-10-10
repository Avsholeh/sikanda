<?php

namespace Database\Factories;

use App\Models\Pendukung;
use Illuminate\Database\Eloquent\Factories\Factory;

class PendukungFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pendukung::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_dokumen' => '00' . $this->faker->randomNumber(2, true) . '/PENDUKUNG'
        ];
    }
}
