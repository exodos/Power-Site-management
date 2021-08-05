<?php

namespace Database\Factories;

use App\Models\Site;
use App\Models\Ups;
use App\Models\WorkOrder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class UpsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ups::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'ups_type' => $this->faker->sentence(1),
            'ups_model' => $this->faker->sentence(1),
            'ups_capacity' => $this->faker->randomFloat(),
            'input_pob_type' => $this->faker->sentence(1),
            'input_pob_capacity' => $this->faker->randomFloat(),
            'number_of_ups_model' => $this->faker->randomNumber(),
            'battery_type' => $this->faker->sentence(1),
            'numbers_of_battery_banks' => $this->faker->randomElement(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']),
            'battery_capacity' => $this->faker->randomElement(['50', '100', '150', '200', '250', '300', '350', '400', '450', '500', '550', '600', '650', '700', '750', '800', '850', '900'
                , '950', '1000', '1050', '1100', '1150', '1200', '1250', '1300', '1350', '1400', '1450', '1500', '1550', '1600', '1650', '1700', '1750', '1800', '1850', '1900', '1950', '2000'
                , '2050', '2100', '2150', '2200', '2250', '2300', '2350', '2400', '2450', '2500', '2550', '2600', '2650', '2700', '2750', '2800', '2850', '2900', '2950', '3000']),
            'battery_holding_time' => Carbon::now()->format('H:i:s'),
            'LLD_number' => $this->faker->randomNumber(),
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
