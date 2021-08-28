<?php

namespace Database\Factories;

use App\Models\TransmissionClientBoards;
use App\Models\TransmissionOtnServices;
use App\Models\TransmissionSite;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransmissionOtnServicesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransmissionOtnServices::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'service_name' => $this->faker->sentence(1),
            'customer_name' => $this->faker->name,
            'sla_type' => $this->faker->sentence(1),
            'rate' => $this->faker->sentence(1),
            'source_ne' => $this->faker->sentence(1),
            'source_port_number' => $this->faker->randomNumber(),
            'sink_ne' => $this->faker->sentence(1),
            'sink_board_id' => $this->faker->randomNumber(),
            'sink_port_number' => $this->faker->randomNumber(),
            'transmission_client_boards_id' => function () {
                return TransmissionClientBoards::inRandomOrder()->first()->id;
            },
            'transmission_site_id'=>function(){
                return TransmissionSite::inRandomOrder()->first()->id;
            },
        ];
    }
}
