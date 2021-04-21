<?php

namespace Database\Factories;

use App\Models\Rectifier;
use App\Models\Site;
use Illuminate\Database\Eloquent\Factories\Factory;

class RectifierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rectifier::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'rectifiers_model' => $this->faker->sentence(1),
            'number_of_rectifiers' => $this->faker->randomNumber(),
            'rectifiers_capacity' => $this->faker->randomFloat(),
            'site_id' => function () {
                return Site::inRandomOrder()->first()->id;
            },
        ];
    }
}
