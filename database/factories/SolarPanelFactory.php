<?php

namespace Database\Factories;

use App\Models\Site;
use App\Models\SolarPanel;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolarPanelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SolarPanel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'solar_panels_number' => $this->faker->randomNumber(),
            'solar_panels_capacity' => $this->faker->randomFloat(),
            'solar_panels_regulatory_model' => $this->faker->sentence(1),
            'solar_panels_module_capacity' => $this->faker->randomFloat(),
            'site_id' => function () {
                return Site::inRandomOrder()->first()->id;
            },
        ];
    }
}
