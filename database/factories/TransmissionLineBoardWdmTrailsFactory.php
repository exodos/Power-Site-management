<?php

namespace Database\Factories;

use App\Models\TransmissionLineBoards;
use App\Models\TransmissionLineBoardWdmTrails;
use App\Models\TransmissionSite;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransmissionLineBoardWdmTrailsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransmissionLineBoardWdmTrails::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'trail_name' => $this->faker->sentence(1),
            'working_mode' => $this->faker->sentence(1),
            'source_ne' => $this->faker->sentence(1),
            'source_port_number' => $this->faker->randomNumber(),
            'source_port_wave_length' => $this->faker->randomFloat(),
            'sink_ne' => $this->faker->sentence(1),
            'sink_board_id' => $this->faker->randomNumber(),
            'sink_port_number' => $this->faker->randomNumber(),
            'sink_port_wave_length' => $this->faker->randomFloat(),
            'transmission_line_boards_id' => function () {
                return TransmissionLineBoards::inRandomOrder()->first()->id;
            },
            'transmission_site_id'=>function(){
                return TransmissionSite::inRandomOrder()->first()->id;
            },
        ];
    }
}
