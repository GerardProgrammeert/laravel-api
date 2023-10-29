<?php

namespace Domains\Post\Services;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PostService
{
    public static function getSubscribersPosts(Carbon $date = null): Collection
    {
        if ($date === null) {
            $date = now();
        }

        $users = DB::table('users')
            ->select('users.id','posts.id')
            ->join('category_user','users.id','=', 'category_user.user_id')
            ->join('category_post', 'category_post.category_id','=','category_user.category_id')
            ->join('posts','posts.id', '=','category_post.post_id')
            ->where('posts.created_at', '>=', $date->toDateString())
            ->groupBy(['users.id','posts.id'])
            ->get();


        foreach($users as $user){
            dump($user);
        }

        return $users;
    }
}
