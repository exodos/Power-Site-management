<?php

namespace Database\Factories;

use App\Models\Microwave;
use App\Models\Rectifier;
use App\Models\Site;
use App\Models\TransmissionSite;
use Illuminate\Database\Eloquent\Factories\Factory;

class MicrowaveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Microwave::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->randomNumber(8),
            'site_name' => $this->faker->sentence(1),
            'site_type' => $this->faker->sentence(1),
            'installed_capacity' => $this->faker->randomFloat(),
            'maximum_capacity' => $this->faker->randomFloat(),
            'polarization' => $this->faker->randomFloat(),
            'transmission_site_id' => function () {
                return TransmissionSite::inRandomOrder()->first()->id;
            },
        ];
    }
}
