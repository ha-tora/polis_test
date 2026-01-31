<?php

namespace App\Article\Http\API\Resources\Article;

use App\Article\Http\API\Resources\Comment\CommentCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Str;

class ArticleCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return $this->collection->transform(function ($article) {
            return [
                'id'            => $article->id,
                'title'         => $article->title,
                'short_content' => $this->getShortContent($article->content),
                'comments'      => new CommentCollection($article->comments),
                'created_at'    => $article->created_at
            ];
        })->toArray();
    }

    private function getShortContent(string $content, int $min = 200, int $max = 300) 
    {
        $paragraphs = preg_split('/\n\s*\n/', trim($content));

        $result = $paragraphs[0] ?? '';

        if (Str::length($result) < 200 && isset($paragraphs[1])) {
            $result .= "\n\n".$paragraphs[1];
        }

        return Str::limit($result, 300);
    }
}
