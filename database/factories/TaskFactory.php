<?php

namespace Database\Factories;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $projectIds=Project::pluck('id');
        return [
            'title' => fake()->sentence(4),
            "priority" => fake()->randomElement(['high', 'medium', 'low']),
            "is_completed" => fake()->randomElement(['not started', 'in progress', 'completed']),
            "deadline" => fake()->dateTimeThisYear(),
            'created_at' => Carbon::now(),
            'updated_at' => fake()->dateTime(),
            "project_id"=>fake()->randomElement($projectIds)
            


        ];
    }
}
