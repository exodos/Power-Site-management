<?php

namespace Database\Factories;

use App\Models\Power;
use App\Models\Site;
use App\Models\WorkOrder;
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
            'id' => $this->faker->unique()->randomNumber(8),
            'generator_type' => $this->faker->randomElement(['Pramac', 'Cummins', 'Lionrock', 'Meiko', 'Cooltech', 'Greenpower', 'Colem', 'Tellhow', 'Johndeere', 'VM', 'Perkins', 'Volvo', 'Sidmo', 'Deutz', 'James Dring', 'Benie', 'Iveco', 'Dossan', 'Star power']),
            'generator_capacity' => $this->faker->randomElement(['10', '15', '20', '22', '25', '30', '40', '50', '60', '75', '100', '110', '120', '125', '200', '300', '400', '500', '600', '800', '1500']),
            'engine_model' => $this->faker->sentence(1),
            'fuel_tanker_capacity' => $this->faker->randomFloat(),
            'alternator_model' => $this->faker->sentence(1),
            'alternator_capacity' => $this->faker->randomNumber(),
            'controller_mode_model' => $this->faker->sentence(1),
            'ats_model' => $this->faker->sentence(1),
            'ats_capacity' => $this->faker->randomNumber(),
            'generator_foundation_size' => $this->faker->randomNumber(),
            'fuel_tank_foundation_size' => $this->faker->randomNumber(),
            'fuel_tanker_type' => $this->faker->sentence(1),
            'fuel_tank_Qty' => $this->faker->randomNumber(),
            'starter_battery_capacity' => $this->faker->randomElement(['65', '70', '90', '120', '150', '200']),
            'starter_battery_type' => $this->faker->name,
            'functionality_status' => $this->faker->randomElement(['Auto', 'Manual', 'Faulty', 'Damaged']),
            'dg_commission_date' => now(),
            'dg_lld_number' => $this->faker->randomNumber(),
            'grid_power_line_voltage_and_transformer_capacity' => $this->faker->randomElement(['33 kV/50 KVA', '33 KV/25 KVA', '15 kV/50 KVA', '15 KV/25 KVA', '15 KV/100 KVA', '15 KV/315 KVA', '15 KV/400 KVA', '15 KV/630 KVA', '15 KV/800 KVA', '15 KV/1250 KVA']),
            'transformer_installation_date' => now(),
            'site_id' => function () {
                return Site::inRandomOrder()->first()->id;
            },
            'work_order_id' => function () {
                return WorkOrder::inRandomOrder()->first()->id;
            },
        ];
    }
}
