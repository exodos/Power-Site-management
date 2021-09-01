<?php

namespace Database\Factories;

use App\Models\Battery;
use App\Models\Site;
use App\Models\WorkOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class BatteryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Battery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->randomNumber(8),
            'batteries_type' => $this->faker->sentence(1),
            'batteries_model' => $this->faker->sentence(1),
            'batteries_voltage' => $this->faker->randomElement(['12', '2']),
            'batteries_capacity' => $this->faker->randomElement(['50', '100', '150', '200', '250', '300', '350', '400', '450', '500', '550', '600', '650', '700', '750', '800', '850', '900'
                , '950', '1000', '1050', '1100', '1150', '1200', '1250', '1300', '1350', '1400', '1450', '1500', '1550', '1600', '1650', '1700', '1750', '1800', '1850', '1900', '1950', '2000'
                , '2050', '2100', '2150', '2200', '2250', '2300', '2350', '2400', '2450', '2500', '2550', '2600', '2650', '2700', '2750', '2800', '2850', '2900', '2950', '3000']),
            'number_of_batteries_banks' => $this->faker->randomElement(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']),
            'battery_holding_Time' => $this->faker->randomFloat(),
            'commission_date' => now(),
            'lld_number' => $this->faker->randomNumber(),
            'site_id' => function () {
                return Site::inRandomOrder()->first()->id;
            },
            'work_order_id' => function () {
                return WorkOrder::inRandomOrder()->first()->id;
            },

        ];
    }

}
