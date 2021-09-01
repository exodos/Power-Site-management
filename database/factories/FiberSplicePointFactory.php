<?php

namespace Database\Factories;

use App\Models\FiberLink;
use App\Models\FiberSplicePoint;
use App\Models\Site;
use App\Models\TransmissionSite;
use Illuminate\Database\Eloquent\Factories\Factory;

class FiberSplicePointFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FiberSplicePoint::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->randomNumber(8),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'fiber_links_id' => function () {
                return FiberLink::inRandomOrder()->first()->id;
            },
            'transmission_site_id'=>function(){
                return TransmissionSite::inRandomOrder()->first()->id;
            },
        ];
    }
}
