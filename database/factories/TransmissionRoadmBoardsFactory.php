<?php

namespace Database\Factories;

use App\Models\TransmissionEquipment;
use App\Models\TransmissionRoadmBoards;
use App\Models\TransmissionSite;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransmissionRoadmBoardsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransmissionRoadmBoards::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'board_name' => $this->faker->sentence(1),
            'slot_number' => $this->faker->randomNumber(),
            'type' => $this->faker->sentence(1),
            'number_free_ports' => $this->faker->randomNumber(),
            'number_used_ports' => $this->faker->randomNumber(),
            'direction' => $this->faker->randomElement(['North', 'South', 'West', 'East']),
            'transmission_equipment_id' => function () {
                return TransmissionEquipment::inRandomOrder()->first()->id;
            },
            'transmission_site_id'=>function(){
                return TransmissionSite::inRandomOrder()->first()->id;
            },
        ];
    }
}
