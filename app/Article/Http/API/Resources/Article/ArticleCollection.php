<?php

namespace App\Article\Http\API\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Str;

class ArticleCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'title'         => $this->title,
            'short_content' => $this->getShortContent($this->content),
            'created_at'    => $this->created_at
        ];
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
