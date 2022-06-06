<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kandidat;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Voting;

class VotingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function voting()
    {
        $id = Auth::id();

        $hasVoted= Voting::where('user_id', $id)->first();
        if ($hasVoted){
            return view('hasil', [
                'result' => $hasVoted
            ]);
        }
        else{
            return view('voting', [
                "title" => 'Halaman Voting',
                "candidates" => Kandidat::all()
            ]);
        }
    }

    public function store(Request $request)
    {
        $user_id = Auth::id(); 

        $request->validate([
            'kandidatvote' => 'required'
        ]);

        // $this->validate($request,[
        //     'kandidatvote' => 'required',
        // ],$messagesError);

        // return view('hasil',['data' => $request]);
        // dd($request);
        $voting = new Voting;
        $voting->user_id = $user_id;
        $voting->kandidat_id = $request->kandidatvote;
        $voting->save();


        return redirect()->route('voting.voting')->with('tambah_review', 'Penambahan Pengguna berhasil');

    }

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
