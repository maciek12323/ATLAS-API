<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function showUserStats($userId)
    {
        $userStats = Statistics::where('user_id', $userId)->first();

        if (!$userStats) {
            return response()->json(['error' => 'User statistics not found'], 404);
        }

        return response()->json(['user_stats' => $userStats], 200);
    }
}
