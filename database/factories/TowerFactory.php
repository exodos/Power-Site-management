<?php

namespace Database\Factories;

use App\Models\Site;
use App\Models\Tower;
use App\Models\WorkOrder;
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
            'towers_type' => $this->faker->randomElement(['Rooftop', 'Green field', 'Small cell', 'Pole', '3 Leg', '4 -leg', 'Camoflage', 'RT']),
            'towers_height' => $this->faker->randomElement(['6', '16', '18', '24', '30', '35', '45', '60', '70', '80']),
            'towers_brand' => $this->faker->sentence(1),
            'towers_soil_type' => $this->faker->sentence(1),
            'towers_foundation_type' => $this->faker->sentence(1),
            'towers_design_load_capacity' => $this->faker->randomNumber(),
            'towers_sharing_operator' => $this->faker->sentence(1),
            'tower_used_load_capacity' => $this->faker->randomNumber(),
            'ethio_antenna_weight' => $this->faker->randomFloat(),
            'ethio_antenna_height' => $this->faker->randomFloat(),
            'operator_antenna_height' => $this->faker->randomFloat(),
            'operator_tower_load' => $this->faker->randomFloat(),
            'operator_antenna_weight' => $this->faker->randomFloat(),
            'tower_installation_date' => now(),
            'site_id' => function () {
                return Site::inRandomOrder()->first()->id;
            },
            'work_order_id' => function () {
                return WorkOrder::inRandomOrder()->first()->id;
            },
        ];
    }
}
