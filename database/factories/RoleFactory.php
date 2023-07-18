<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $roleable = [
        User::class,
        ];
        return [
            //
           "role"=>fake()->randomElement(["administrator", "author", "guest"]),
            "roleable_id"=>fake()->numberBetween(1, 20),
            "roleable_type"=>fake()->randomElement($roleable)
        ];
    }
}
