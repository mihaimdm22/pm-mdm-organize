<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->word,
            'description' => $this->faker->paragraph,
            'status'      => $this->faker->randomElement(['to_do', 'in_progress', 'done']),
            'attachment'  => $this->faker->file($sourceDir = 'public/storage/files/default', $targetDir = 'public/storage/files'),
            'assigned_to' => User::factory(),
            'project_id'  => Project::factory(),
        ];
    }
}
