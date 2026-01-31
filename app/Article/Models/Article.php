<?php

namespace App\Article\Models;

use App\Article\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    const UPDATED_AT = null;

    protected $fillable = [
        'title',
        'content'
    ];

    public function comments(): HasMany 
    {
        return $this->hasMany(Comment::class);
    }
}
