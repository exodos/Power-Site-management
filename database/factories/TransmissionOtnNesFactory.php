<?php

namespace Database\Factories;

use App\Models\TransmissionOtnNes;
use App\Models\TransmissionSite;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransmissionOtnNesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransmissionOtnNes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ne_name' => $this->faker->sentence(1),
            'ne_type' => $this->faker->sentence(1),
            'ne_vendor' => $this->faker->company,
            'transmission_site_id' => function () {
                return TransmissionSite::inRandomOrder()->first()->id;
            },
        ];
    }
}
