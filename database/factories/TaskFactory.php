<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'title' => fake()->sentence(),
            "priority" => fake()->randomElement(['high', 'medium', 'low']),
            "is_completed" => fake()->randomElement(['not started', 'in progress', 'completed']),
            "deadline" => fake()->dateTimeThisYear(),
            'created_at' => Carbon::now(),
            'updated_at' => fake()->dateTime(),
        ];
    }
}
