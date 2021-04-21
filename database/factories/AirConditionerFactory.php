<?php

namespace Database\Factories;

use App\Models\AirConditioner;
use App\Models\Site;
use Illuminate\Database\Eloquent\Factories\Factory;

class AirConditionerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AirConditioner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'=>$this->faker->unique()->randomNumber(),
            'air_conditioners_model'=>$this->faker->name,
            'air_conditioners_capacity'=>$this->faker->randomFloat(),
            'site_id'=> function(){
            return Site::inRandomOrder()->first()->id;
            },
        ];
    }
}
