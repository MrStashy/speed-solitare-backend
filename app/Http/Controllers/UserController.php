<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function getUsernames(): JsonResponse {
        $usernames = User::pluck('username');

        return response()->json($usernames);
    }
}
