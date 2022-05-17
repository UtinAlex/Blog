<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $role_id = User::inRandomOrder()->first()->id;
        
        return [
            'users_id' => $role_id,
            'article' => $this->faker->text(100),
            'visibility' => $this->faker->numberBetween(0, 1),
            'created_at' => $this->faker->dateTimeBetween('-2 years', '-1 years'),
            'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now')
        ];
    }
}
