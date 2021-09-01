<?php

namespace Database\Factories;

use App\Models\Site;
use App\Models\SolarPanel;
use App\Models\WorkOrder;
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
            'id' => $this->faker->unique()->randomNumber(8),
            'number_solar_system' => $this->faker->randomNumber(),
            'solar_panel_type' => $this->faker->sentence(1),
            'solar_panels_module_capacity' => $this->faker->randomFloat(),
            'number_of_arrays' => $this->faker->randomNumber(),
            'solar_controller_type' => $this->faker->sentence(1),
            'regulator_capacity' => $this->faker->randomNumber(),
            'solar_regulator_Qty' => $this->faker->randomNumber(),
            'number_of_structure_group' => $this->faker->randomNumber(),
            'solar_structure_front_height' => $this->faker->randomNumber(),
            'solar_structure_rear_height' => $this->faker->randomNumber(),
            'commission_date' => $this->faker->date(),
            'site_id' => function () {
                return Site::inRandomOrder()->first()->id;
            },
            'work_order_id' => function () {
                return WorkOrder::inRandomOrder()->first()->id;
            },
        ];
    }
}
