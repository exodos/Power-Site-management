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
            'microwave_id'=>$this->faker->unique()->randomNumber(),
            'power_consumption' => $this->faker->randomFloat(),
            'breaker_type' => $this->faker->sentence(1),
            'breaker_quantity' => $this->faker->randomNumber(),
            'site_type' => $this->faker->sentence(1),
            'installed_capacity' => $this->faker->randomFloat(),
            'maximum_capacity' => $this->faker->randomFloat(),
            'polarization' => $this->faker->randomFloat(),
            'llvd_capacity' => function () {
                return Rectifier::inRandomOrder()->first()->llvd_capacity;
            },
            'blvd_capacity' => function () {
                return Rectifier::inRandomOrder()->first()->blvd_capacity;
            },
            'site_id'=>function(){
                return Site::inRandomOrder()->first()->id;
            },
        ];
    }
}
