<?php

namespace Database\Factories;

use App\Models\Otn;
use App\Models\Rectifier;
use App\Models\Site;
use Illuminate\Database\Eloquent\Factories\Factory;

class OtnFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Otn::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'power_consumption' => $this->faker->randomFloat(),
            'breaker_type' => $this->faker->sentence(1),
            'breaker_quantity' => $this->faker->randomNumber(),
            'llvd_capacity' => function () {
                return Rectifier::inRandomOrder()->first()->llvd_capacity;
            },
            'blvd_capacity' => function () {
                return Rectifier::inRandomOrder()->first()->blvd_capacity;
            },
            'site_id' => function () {
                return Site::inRandomOrder()->first()->id;
            },
        ];
    }
}
