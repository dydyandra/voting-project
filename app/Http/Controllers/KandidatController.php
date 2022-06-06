<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kandidat;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;



class KandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function index()
    {
        $kandidat = Cache::remember('kandidat', 60, function () {
            return DB::table('kandidats')->latest()->get();
        });

        return view('kandidat.list-kandidat', [
            'kandidat' => $kandidat,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $author = Book::pluck('author', 'id');
        return view('kandidat.create-kandidat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:5|max:255',
            'keterangan' => 'required|min:10|max:255',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);

        if ($request->hasFile('photo')) {
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('photo')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('photo')->storeAs('public/images', $fileNameToStore);
        }
        // Else add a dummy image
        else {
            $fileNameToStore = 'noimage.jpg';
        }

        $slug = Str::slug($request->nama, '-');

        $kandidat = new Kandidat;
        $kandidat->nama = $request->nama;
        $kandidat->slug = $slug;
        $kandidat->keterangan = $request->keterangan;
        $kandidat->photo = $fileNameToStore;
        $kandidat->save();


        return redirect()->route('kandidat.list-kandidat')->with('tambah_data', 'Penambahan Pengguna berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kandidat = Kandidat::where('id', $id)->first();
        return view('kandidat.detail-kandidat', [
            'kandidat' => $kandidat
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kandidat = Kandidat::where('id', $id)->first();
        return view('kandidat.edit-kandidat', [
            'kandidat' => $kandidat
        ]);
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
        $request->validate([
            'nama' => 'required|min:5|max:255',
            'keterangan' => 'required|min:10|max:255',
            // 'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);

        $kandidat = Kandidat::findOrFail($id);

        $slug = Str::slug($request->nama, '-');
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image',
            ]);

            if ($kandidat->photo != 'noimage.jpg') {
                Storage::disk('public')->delete('images/' . $kandidat->photo);
            }

            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('photo')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('photo')->storeAs('public/images', $fileNameToStore);

            $kandidat->update([
                'nama' => $request['nama'],
                'keterangan' => $request['keterangan'],
                'slug' => $slug, 
                'photo' => $fileNameToStore,
            ]);
        } else {
            $kandidat->update([
                'nama' => $request['nama'],
                'keterangan' => $request['keterangan'],
                'slug' => $slug, 
            ]);
        }

        return redirect()->route('kandidat.list-kandidat')->with('edit_data', 'Pengeditan Data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kandidat = Kandidat::findOrFail($id);
        if ($kandidat->photo != 'noimage.jpg') {
            Storage::disk('public')->delete('images/' . $kandidat->photo);
        }
        $kandidat->delete();
        return redirect()->route('kandidat.list-kandidat')->with('hapus_data', 'Penghapusan data berhasil');
    }

    public function content(Kandidat $kandidat){
        return view('kandidat-detail', [
            "kandidat" => $kandidat
        ]);
}
}
