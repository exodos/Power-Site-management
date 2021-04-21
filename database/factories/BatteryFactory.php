<?php

namespace Database\Factories;

use App\Models\Battery;
use App\Models\Site;
use Illuminate\Database\Eloquent\Factories\Factory;

class BatteryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Battery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'batteries_model' => $this->faker->sentence(1),
            'number_of_batteries_group' => $this->faker->randomNumber(),
            'batteries_capacity' => $this->faker->randomFloat(),
            'site_id' => function () {
                return Site::inRandomOrder()->first()->id;
            },
        ];
    }
}
