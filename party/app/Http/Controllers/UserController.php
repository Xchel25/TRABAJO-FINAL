<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        $users = User::all();
        return response()->json($users, Response::HTTP_OK);
    }

    public function store(SaveUserRequest $request): JsonResponse
    {
        try {
            $user = User::create($request->validated());
            return response()->json($user, Response::HTTP_CREATED);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(string $id): JsonResponse
    {
        $user = User::findOrFail($id);
        return response()->json($user, Response::HTTP_OK);
    }

    public function update(SaveUserRequest $request, string $id): JsonResponse
    {
        try {
            $user = User::findOrFail($id);
            $user->update($request->validated());
            return response()->json($user, Response::HTTP_OK);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(string $id): JsonResponse
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
