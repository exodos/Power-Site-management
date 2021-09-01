<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Port;
use App\Models\Ports;
use Illuminate\Database\Eloquent\Factories\Factory;

class PortFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Port::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->randomNumber(8),
            'name' => $this->faker->name,
            'device_role' => $this->faker->randomElement(['IGW', 'P', 'PE', 'CS', 'OTHER']),
            'slot' => $this->faker->randomElement(['CONTROL', 'SERVICE', 'OTHER']),
            'slot_usage' => $this->faker->randomElement(['FREE', 'USED']),
            'card_type' => $this->faker->randomElement(['100GE', '40GE', '10GE', '1GE(Opt)', '1GE(Elec)', 'OTHER']),
            'port_usage' => $this->faker->randomElement(['FREE', 'USED']),
        ];
    }
}
