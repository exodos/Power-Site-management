<?php

namespace Database\Factories;

use App\Models\FiberLink;
use App\Models\FiberSplicePoint;
use App\Models\Site;
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
            'fiber_splice_point_id' => $this->faker->unique()->randomNumber(),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'link_id' => function () {
                return FiberLink::inRandomOrder()->first()->link_id;
            },
            'site_id' => function () {
                return Site::inRandomOrder()->first()->id;
            },
        ];
    }
}
