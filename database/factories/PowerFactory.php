<?php

namespace Database\Factories;

use App\Models\Power;
use App\Models\Site;
use Illuminate\Database\Eloquent\Factories\Factory;

class PowerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Power::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'powers_type' => $this->faker->sentence(1),
            'dg_model' => $this->faker->sentence(1),
            'dg_capacity' => $this->faker->randomFloat(),
            'fuel_tanker_capacity' => $this->faker->randomFloat(),
            'site_id' => function () {
                return Site::inRandomOrder()->first()->id;
            },
        ];
    }
}
