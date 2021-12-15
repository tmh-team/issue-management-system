<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create(),
            'phone' => '+95' . rand(000000000, 999999999),
            'address' => $this->faker->text(20),
            'joined_at' => now()->subDays(rand(1, 28)),
            'resigned_at' => now()->addMonths(rand(1, 12)),
        ];
    }
}
