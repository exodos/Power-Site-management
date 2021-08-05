<?php

namespace Database\Factories;

use App\Models\Site;
use App\Models\WorkOrder;
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
            'ps_configuration' => $this->faker->randomElement(['Mains Only', 'Mains + DG', 'Dual DG', 'DG + BB', 'Solar Hybrid', 'Pure Solar']),
            'monitoring_status' => $this->faker->randomElement(['Monitored', 'Not Monitored']),
            'sites_latitude' => $this->faker->latitude,
            'sites_longitude' => $this->faker->longitude,
            'sites_region_zone' => $this->faker->randomElement(['NWR', 'SWWR', 'NEER', 'CNR', 'CWR', 'NER', 'CER', 'ER', 'EER', 'SSWR', 'NNWR', 'SR', 'SER', 'WR', 'SWR', 'WWR', 'NR', 'CAAZ', 'WAAZ', 'SWAAZ', 'NAAZ', 'EAAZ', 'SAAZ']),
            'sites_political_region' => $this->faker->randomElement(['Tigray', 'Amhara', 'Oromia', 'SNNP', 'Sidama', 'Harari', 'Diredawa', 'AA', 'Benishangul', 'Somali', 'Gambela', 'Afar']),
            'sites_location' => $this->faker->country,
            'sites_class' => $this->faker->randomElement(['Class 1', 'Class 2', 'Class 3', 'Class 4', 'Class 5']),
            'sites_value' => $this->faker->sentence(1),
            'sites_type' => $this->faker->randomElement(['In door BTS', 'Out door BTS', 'Indoor non-BTS', 'Out door non-BTS']),
            'maintenance_center' => $this->faker->sentence(1),
            'distance_mc' => $this->faker->randomFloat(),
            'list_of_ne' => $this->faker->sentence(1),
            'number_of_towers' => $this->faker->randomNumber(),
            'number_of_generator' => $this->faker->randomNumber(),
            'number_of_airconditioners' => $this->faker->randomNumber(),
            'number_of_rectifiers' => $this->faker->randomNumber(),
            'number_of_solar_system' => $this->faker->randomNumber(),
            'number_of_down_links'=>$this->faker->randomNumber(),
            'work_order_id' => function () {
                return WorkOrder::inRandomOrder()->first()->id;
            },
        ];
    }
}
