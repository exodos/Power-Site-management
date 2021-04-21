<?php

namespace Database\Factories;

use App\Models\Site;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Site::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'sites_name' => $this->faker->name,
            'sites_latitude' => $this->faker->latitude,
            'sites_longitude' => $this->faker->longitude,
            'sites_region_zone' => $this->faker->city,
            'sites_political_region' => $this->faker->state,
            'sites_category' => $this->faker->sentence(1),
            'sites_class' => $this->faker->sentence(1),
            'sites_value' => $this->faker->sentence(1),
            'sites_type' => $this->faker->sentence(1),
            'sites_configuration' => $this->faker->sentence(1),
            'monitoring_system_name' => $this->faker->sentence(1),
            'commercial_power_line_voltage' => $this->faker->randomNumber(),
            'distance_maintenance_center' => $this->faker->randomFloat(),
        ];
    }
}
