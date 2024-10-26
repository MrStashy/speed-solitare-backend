<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function getUsernames(): JsonResponse {
        $usersWithScores = User::with(['scores' => function ($query) {
            $query->orderBy('final_score', 'desc')->limit(5);
        }])
        ->take(10)
        ->get();

        return response()->json($usersWithScores);
    }

    public function postUserAndScore(Request $request): JsonResponse {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'finalScore' => 'required|number',
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
    
        $validatedData = $validator->validated();

        $user = User::firstOrCreate(['username' => $validatedData['username']]);
        $user->scores()->create(['final_score' => $validatedData['finalScore']]);

        return response()->json(['message' => 'Data saved successfully']);
    }
}
