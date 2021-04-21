<?php

namespace Database\Factories;

use App\Models\Site;
use App\Models\Ups;
use Illuminate\Database\Eloquent\Factories\Factory;

class UpsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ups::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'ups_model' => $this->faker->sentence(1),
            'ups_capacity' => $this->faker->randomFloat(),
            'number_of_ups_model' => $this->faker->randomNumber(),
            'site_id' => function () {
                return Site::inRandomOrder()->first()->id;
            },
        ];
    }
}
