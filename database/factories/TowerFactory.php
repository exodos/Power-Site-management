<?php

namespace Database\Factories;

use App\Models\Site;
use App\Models\Tower;
use Illuminate\Database\Eloquent\Factories\Factory;

class TowerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tower::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'towers_brand' => $this->faker->sentence(1),
            'towers_height' => $this->faker->randomFloat(),
            'towers_load_capacity' => $this->faker->randomFloat(),
            'towers_sharing_operator' => $this->faker->sentence(1),
            'site_id' => function () {
                return Site::inRandomOrder()->first()->id;
            },
        ];
    }
}
