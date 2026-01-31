<?php

namespace App\Article\Models;

use App\Article\Models\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    const UPDATED_AT = null;

    protected $fillable = [
        'article_id',
        'author_name',
        'content'
    ];

    public function article(): BelongsTo 
    {
        return $this->belongsTo(Article::class);
    }
}
