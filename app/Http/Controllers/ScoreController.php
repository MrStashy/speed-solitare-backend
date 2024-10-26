<?php

namespace App\Http\Controllers;

use App\Models\Score;

use Illuminate\Http\JsonResponse;

class ScoreController extends Controller
{

    public function getTopTen(): JsonResponse
    {
        $topScores = Score::with('user')
            ->orderBy('final_score', 'desc')
            ->take(10)
            ->get(['final_score', 'user_id']);

        return response()->json($topScores->map(function ($score) {
            return [
                'username' => $score->user->username, 
                'finalScore' => $score->final_score
            ];
        }));
    }
}
