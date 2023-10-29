<?php

namespace Domains\Post\Http;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Domains\Post\Http\Requests\PostCreateRequest;
use Domains\Post\Models\Post;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class PostController extends Controller
{
    public function index(): JsonResource
    {
        return PostResource::collection(Post::paginate(5));
    }

    public function store(PostCreateRequest $request): JsonResource
    {
        $data = $request->validated();
        $categoryIds =  data_get($data,['category_ids']);
        Arr::forget($data, 'category_ids');

        $post = new Post($data);
        $post->save();
        $post->categories()->attach($categoryIds);

        return new PostResource($post);
    }
}
