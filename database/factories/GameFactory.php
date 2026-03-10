<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titles = [
            'Color Quest',
            'Shape Matcher',
            'Number Master',
            'Word Builder',
            'Math Challenge',
            'Pattern Finder',
        ];

        $title = fake()->randomElement($titles);

        return [
            'title' => $title,
            'slug' => str($title)->slug(),
            'description' => fake()->sentence(),
            'levels' => 40,
            'difficulty' => fake()->randomElement(['easy', 'medium', 'hard']),
            'color' => fake()->hexColor(),
            'icon' => fake()->randomElement(['🎨', '🔷', '🔢', '📝', '🧮', '🧩']),
            'is_active' => true,
        ];
    }
}
