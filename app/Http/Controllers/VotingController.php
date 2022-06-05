<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kandidat;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class VotingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function voting()
    {
        return view('voting', [
            "title" => 'Halaman Voting',
            "candidates" => Kandidat::all()
        ]);
    }
    public function hasil(Request $request)
    {
        $messagesError = [
            'required' => ':attribute ini wajib diisi!',
            'min' => ':attribute harus diisi minimal :min karakter!',
            'max' => ':attribute harus diisi maksimal :max karakter!',
            'mimes' => ':foto harus berupa jpg,png,jpeg!',
            'numeric' => 'attribute harus diisi angka!',
        ];

        $this->validate($request,[
            'nama_depan' => 'required|min:5',
            'nama_belakang' => 'required|min:5|max:40',
            'jenis_kelamin' => 'required|max:1',
            'alamat' => 'required',
            'email' => 'required',
            'nomor_telepon' => 'required|numeric',
            'ktp' => 'required|mimes:jpg,png,jpeg|max:2048',
        ],$messagesError);
        $request->ktp = $this->SavePhoto($request);
        return view('hasil',['data' => $request]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

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
