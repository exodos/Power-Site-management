<?php

namespace Database\Factories;

use App\Models\AirConditioner;
use App\Models\Site;
use App\Models\WorkOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

class AirConditionerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AirConditioner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'air_conditioners_type' => $this->faker->randomElement(['STULZ', 'AIRSYS', 'WEISS', 'Fjutisu', 'TADIRAN', 'Hisense']),
            'air_conditioners_model' => $this->faker->randomElement(['ASU812AS', 'ASU622AS', 'CSU542A', 'CSU442A', 'CSU431A', 'CSU352A', 'CCU251A', 'CCU271A', 'CCU201A', 'CCD91A'
                , 'CCU81A', 'DXA40E1S7', 'DXA22E1S4', 'DATA240UV', 'DATA45UV', 'WVL2000S', 'AOY30EPAL', 'TCO-28H', 'KT3FR-250LW/01TDE', 'KT3FR-120LW/01TDE', 'KF-80W/T12SE-N1', 'KFR-68WT/TSE-N3'
                , 'KFR-50W/01TFE', 'KFR-48W/01TFE', 'KFR-25W/01TFE']),
            'air_conditioners_capacity' => $this->faker->randomElement(['81KW', '62KW', '54KW', '44KW', '43KW', '35KW', '25KW', '27KW', '20KW', '9KW', '8KW', '44KW', '22KW', '76KW', '19KW', '9KW', '7.9KW'
                , '6.8KW', '25KW', '12KW', '8KW', '6.8KW', '5KW', '4.8KW', '2.5KW']),
            'functional_type' => $this->faker->randomElement(['Functional', 'Faulty', 'Damaged']),
            'gas_type' => $this->faker->randomElement(['R134A', 'R410', 'R422', 'R407']),
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
