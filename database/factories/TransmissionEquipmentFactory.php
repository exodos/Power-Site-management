<?php

namespace Database\Factories;

use App\Models\TransmissionEquipment;
use App\Models\TransmissionOtnNes;
use App\Models\TransmissionSite;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransmissionEquipmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransmissionEquipment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subrack_name' => $this->faker->sentence(1),
            'subrack_type' => $this->faker->sentence(1),
            'equipment_type' => $this->faker->sentence(1),
            'number_used_slots' => $this->faker->randomNumber(),
            'number_free_slots' => $this->faker->randomNumber(),
            'vendor' => $this->faker->company,
            'transmission_otn_nes_id' => function () {
                return TransmissionOtnNes::inRandomOrder()->first()->id;
            },
            'transmission_site_id'=>function(){
                return TransmissionSite::inRandomOrder()->first()->id;
            },
        ];
    }
}
