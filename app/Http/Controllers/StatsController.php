<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Voting;
use Illuminate\Support\Carbon;

class StatsController extends Controller
{
    public function index(){
        
        // get USER for all
        $user = User::all();
        $user_count = $user->count();

        // get USER for only today
        $userToday = User::whereDate('created_at', Carbon::today())->get();
        $userToday_count = $userToday->count();

        // get Voting for all
        $hasVoted = Voting::all();
        $voting_count = $hasVoted->count();

        // get voting only for today
        $votingToday = Voting::whereDate('created_at', Carbon::today())->get();
        $votingToday_count  = $votingToday->count();


        // get VOTING who has not
        $hasNotVoted = $user_count - $voting_count; 
    	$hasNotVotedPercent = round(($hasNotVoted/$user_count)*100, 2);
        return view('stats', [
            'registered_count' => $user_count,
            'voting_count' => $voting_count,
            'hasNotVoted' => $hasNotVoted,
            'registered_today_count' => $userToday_count,
            'voted_today_count' => $votingToday_count,
            'hasNotVotedPercent' => $hasNotVotedPercent
        ]);

    }
}
