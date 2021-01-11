<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'          => $this->faker->company,
            'description'   => $this->faker->paragraph,
            'start_date'    => $this->faker->date,
            'duration'      => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10),
        ];
    }
}
