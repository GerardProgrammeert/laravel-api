<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use Domains\User\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        $users = User::paginate(5);

        return response()->json($users->toArray());
    }

    public function store(UserStoreRequest $request): JsonResponse
    {
       $request->validated();

       $user = new User($request->all());
        //user->save();
        
       return response()->json($user->toArray(), 201);
    }
}