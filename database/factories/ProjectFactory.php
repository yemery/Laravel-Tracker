<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $usersIds=User::pluck('id');

        return [
            'title'=>fake()->sentence(2),
            'created_at' => Carbon::now(),
            'updated_at'=>fake()->dateTime(),
            'user_id'=>fake()->randomElement($usersIds)

        ];
    }
}
