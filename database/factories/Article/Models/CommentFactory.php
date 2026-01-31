<?php

namespace Database\Factories\Article\Models;

use App\Article\Models\Article;
use App\Article\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        $article = Article::all()->random();

        return [
            'author_name' => fake()->name(),
            'article_id' => $article->id,
            'content'   => fake()->text(200),
            'created_at' => fake()->dateTimeBetween($article->created_at)->getTimestamp()
        ];
    }
}
