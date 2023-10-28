<?php

namespace Domains\Post\Observers;

use Domains\Post\Models\Post;

class PostObserver
{
    public function creating(Post $post): void
    {
        \Log::info('Post creating with data:' . $post->toJson());
    }

    public function created(Post $post): void
    {
        \Log::info('Post created with data: ' . $post->toJson());
    }

    public function updated(Post $post)
    {
    //
    }


    public function deleted(Post $post)
    {
    //
    }


    public function restored(Post $post)
    {
    //
    }


    public function forceDeleted(Post $post)
    {
    //
    }
}
