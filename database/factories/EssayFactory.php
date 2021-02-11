<?php

namespace Database\Factories;

use App\Models\Essay;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EssayFactory extends Factory
{
    protected $model = Essay::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->words(5, true),
            'body' => $this->faker->text,
            'created_at' => $this->faker->dateTimeBetween('-50 days', 'now')
        ];
    }
}
