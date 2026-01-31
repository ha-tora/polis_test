<?php

namespace Database\Factories\Article\Models;

use App\Article\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        return [
            'title'     => fake()->word(),
            'content'   => fake()->text(1000),
            'created_at' => fake()->dateTimeThisYear()->getTimestamp()
        ];
    }
}
