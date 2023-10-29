<?php

namespace Domains\Post\Models;

use Carbon\Carbon;
use Domains\Category\Models\Category;
use Domains\Comment\Enums\CommentableType;
use Domains\Comment\Models\Comment;
use Domains\Shared\Models\ResponsibleModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 * @property string                     $title
 * @property string                     $body
 * @property Collection<int, Comment>   $comments
 * @property Comment                    $latestComment
 * @property Collection<int, Category>  $categories
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

    /** @return BelongsToMany<int, Category> */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
