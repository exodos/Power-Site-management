<?php

namespace Database\Factories;

use App\Models\TransmissionOtnNes;
use App\Models\TransmissionSite;
use App\Models\TransmissionSiteLineFibers;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransmissionSiteLineFibersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransmissionSiteLineFibers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'direction_name' => $this->faker->sentence(1),
            'cabling_method' => $this->faker->sentence(1),
            'fiber_type' => $this->faker->sentence(1),
            'core_number' => $this->faker->randomNumber(),
            'next_hope_ne_id' => $this->faker->randomNumber(),
            'next_hope_distance' => $this->faker->randomNumber(),
            'transmission_otn_nes_id' => function () {
                return TransmissionOtnNes::inRandomOrder()->first()->id;
            },
            'transmission_site_id'=>function(){
                return TransmissionSite::inRandomOrder()->first()->id;
            },
        ];
    }
}
