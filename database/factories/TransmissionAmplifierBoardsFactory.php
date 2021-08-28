<?php

namespace Database\Factories;

use App\Models\TransmissionAmplifierBoards;
use App\Models\TransmissionEquipment;
use App\Models\TransmissionOtnNes;
use App\Models\TransmissionSite;
use App\Models\WorkOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransmissionAmplifierBoardsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransmissionAmplifierBoards::class;

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
            'gain' => $this->faker->sentence(1),
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
