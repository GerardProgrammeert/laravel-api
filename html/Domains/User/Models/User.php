<?php

namespace Domains\User\Models;

use Domains\Category\Models\Category;
use Domains\Comment\Models\Comment;
use Domains\Post\Models\Post;
use Domains\Video\Models\Video;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


/**
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property Collection<int, Post> $posts
 * @property Collection<int, Comment> $comments
 * @property Collection<int, Video> $videos
 * @property Collection<int, Category> $categories
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUlids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /** @return hasMany<int, Post> */
    public function posts(): hasMany
    {
        return $this->hasMany(Post::class, 'created_by');
    }

    /** @return hasMany<int, Video> */
    public function videos(): hasMany
    {
        return $this->hasMany(Video::class, 'created_by');
    }

    /** @return hasMany<int, Comment> */
    public function comments(): hasMany
    {
        return $this->hasMany(Comment::class, 'created_by');
    }

    /** @return BelongsToMany<int, Category>  */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function getNameAttribute($value): string
    {
        return 'hello';
    }
}
