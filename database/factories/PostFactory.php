<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = \App\Models\Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'image'=>'https://source.unsplash.com/random',
            'content'=> $this->faker->text(200),
            'category'=> $this->faker->randomElement(['Art', 'Tech', 'Sport', 'Entertaiment', 'Health', 'Science', 'Events', 'Education', 'Projects', 'Achievements', 'Partners'])
        ];
    }
}
