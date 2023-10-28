<?php

namespace Domains\Post\Models;

use Domains\Comment\Enums\CommentableType;
use Domains\Comment\Models\Comment;
use Domains\Shared\Models\ResponsibleModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string                     $title
 * @property string                     $body
 * @property Collection<int, Comment>   $comments
 * @property Comment                    $latestComment
 */
class Post extends ResponsibleModel
{
    use SoftDeletes;
    use HasUlids;
    use HasFactory;

    protected $fillable = [
       'title',
       'body',
    ];

    protected $casts = [
        'commentable_type' => CommentableType::class
    ];

    /** @return MorphMany<int, Comment> */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /** @return hasOne<Comment> */
    public function latestComment(): hasOne
    {
        return $this->hasOne(Comment::class)->latestOfMany();
    }
}
