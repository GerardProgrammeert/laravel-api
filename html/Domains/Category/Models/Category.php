<?php

namespace Domains\Category\Models;

use Domains\Post\Models\Post;
use Domains\Shared\Models\ResponsibleModel;
use Domains\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Collection;

/**
 * @property string                 $title
 * @property string                 $description
 * @property Collection<int, Post>  $posts
 * @property Collection<int, User>  $users
 */
class Category extends ResponsibleModel
{
    use HasFactory;

    protected $fillable = [
       'title',
       'description',
    ];

    /** @return BelongsToMany<int, Post> */
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    /** @return BelongsToMany<int, User> */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
