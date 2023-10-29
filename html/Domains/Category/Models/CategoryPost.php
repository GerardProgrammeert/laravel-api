<?php

namespace Domains\Category\Models;

use Domains\Post\Models\Post;
use Domains\User\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @see https://darkghosthunter.medium.com/laravel-has-many-through-pivot-elegantly-958dd096db
 * @see https://laraveldaily.com/post/pivot-tables-and-many-to-many-relationships
 */
class CategoryPost extends Pivot
{
    //use HasUlids;

    //public $incrementing = true;

    // TODO is it possible to have an id on
    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }
    //
    // public function post(): BelongsTo
    // {
    //     return $this->belongsTo(Post::class);
    // }
}