<?php

namespace Database\Factories;

use App\Models\FiberLink;
use App\Models\Site;
use App\Models\TransmissionSite;
use Illuminate\Database\Eloquent\Factories\Factory;

class FiberLinkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FiberLink::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->randomNumber(8),
            'link_name' => $this->faker->sentence(1),
            'fiber_type' => $this->faker->sentence(1),
            'used_core' => $this->faker->randomNumber(),
            'free_core' => $this->faker->randomNumber(),
            'number_splice_points' => $this->faker->randomNumber(),
            'average_link_loss' => $this->faker->randomFloat(),
            'ofc_type' => $this->faker->sentence(1),
            'a_end_odf_connector_type' => $this->faker->sentence(1),
            'z_end_odf_connector_type' => $this->faker->sentence(1),
            'transmission_site_id'=>function(){
                return TransmissionSite::inRandomOrder()->first()->id;
            },
        ];
    }
}
