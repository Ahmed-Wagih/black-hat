<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {

        $topUsers = User::orderBy('experience_points', 'desc')->take(3)->get();

        $topUserIds = $topUsers->pluck('id')->toArray();

        $firstUser = $topUsers->first();
        $secondUser = $topUsers->skip(1)->first();
        $thirdUser = $topUsers->skip(2)->first();
        $remainingUsers = User::orderBy('experience_points', 'desc')
        ->whereNotIn('id', $topUserIds)
        ->limit(50)
        ->get();
        return view('web.leaderboard',compact('firstUser','secondUser','thirdUser','remainingUsers'));

    }
}
