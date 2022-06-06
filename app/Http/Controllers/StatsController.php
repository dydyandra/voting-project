<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Voting;

class StatsController extends Controller
{
    public function index(){
        
        
        $user = User::all();
        $user_count = $user->count();

        $hasVoted = Voting::all();
        $voting_count = $hasVoted->count();
        

        $hasNotVoted = $user_count - $voting_count;

        // $kandidat_1 = Voting::where('kandidat_id','1')->get();
    	// $kandidat_2 = Voting::where('kandidat_id','2')->get();
    	// $kandidat_3 = Voting::where('kandidat_id','3')->get();

    	// $kandidat_1_count = count($kandidat_1);    	
    	// $kandidat_2_count = count($kandidat_2);
    	// $kandidat_3_count = count($kandidat_3);
        // $kandidat_total = 
    	
        return view('stats', [
            'registered_count' => $user_count,
            'voting_count' => $voting_count,
            'hasNotVoted' => $hasNotVoted,
        ]);

    }
}
