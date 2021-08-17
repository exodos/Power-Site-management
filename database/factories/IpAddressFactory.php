<?php

namespace Database\Factories;

use App\Models\IpAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class IpAddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IpAddress::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'class_b' => $this->faker->unique()->ipv4,
            'class_c' => $this->faker->ipv4,
            'usage' => $this->faker->randomElement(['FREE', 'USED'])
        ];
    }
}
