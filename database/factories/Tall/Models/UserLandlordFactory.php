<?php

namespace Database\Factories\Tall\Models;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tenant>
 */
class UserLandlordFactory extends Factory
{

    protected $model = \Tall\Models\UserLandlord::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => \Str::random(10),
            'created_at' => now()->format('Y-m-d'),
            'updated_at' => now()->format('Y-m-d'),
        ];
    }
}
