<?php

namespace Domains\Category\Http;

use App\Http\Controllers\Controller;
use Domains\Category\Http\Requests\CategoryStoreRequest;
use Domains\Category\Http\Resources\CategoryResource;
use Domains\Category\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryController extends Controller
{
    public function index(): JsonResource
    {
        return CategoryResource::collection(Category::paginate(5));
    }

    public function store(CategoryStoreRequest $request): JsonResource
    {
        $category = new Category($request->validated());
        $category->save();

        return new CategoryResource($category);
    }
}