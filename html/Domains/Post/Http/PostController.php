<?php

namespace Domains\Post\Http;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Domains\Post\Http\Requests\PostCreateRequest;
use Domains\Post\Models\Post;
use Illuminate\Http\Resources\Json\JsonResource;

class PostController extends Controller
{
    public function index(): JsonResource
    {
        return PostResource::collection(Post::paginate(5));
    }

    public function store(PostCreateRequest $request): JsonResource
    {
        $post = new Post($request->validated());
        $post->save($request->validated());



        return new PostResource($post);
    }
}
