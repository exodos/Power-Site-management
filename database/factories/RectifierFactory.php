<?php

namespace Database\Factories;

use App\Models\Rectifier;
use App\Models\Site;
use App\Models\WorkOrder;
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
            'id' => $this->faker->unique()->randomNumber(8),
            'rectifiers_model' => $this->faker->sentence(1),
            'rectifiers_capacity' => $this->faker->randomNumber(),
            'rectifiers_module_model' => $this->faker->sentence(1),
            'number_of_rectifiers_model_slots' => $this->faker->randomNumber(),
            'rectifiers_module_capacity' => $this->faker->randomFloat(),
            'rectifier_module_Qty' => $this->faker->randomNumber(),
            'llvd_capacity' => $this->faker->randomNumber(),
            'blvd_capacity' => $this->faker->randomNumber(),
            'battery_fuess_Qty' => $this->faker->randomNumber(),
            'power_of_msag_msan_connected_company' => $this->faker->sentence(1),
            'monitoring_system_name' => $this->faker->randomElement(['ECC500', 'ECC800', 'ESC', 'EISU', 'MISU', 'CSU']),
            'lld_number' => $this->faker->randomNumber(),
            'commission_date' => now(),
            'site_id' => function () {
                return Site::inRandomOrder()->first()->id;
            },
            'work_order_id' => function () {
                return WorkOrder::inRandomOrder()->first()->id;
            },
        ];
    }
}
