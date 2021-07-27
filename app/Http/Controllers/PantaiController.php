<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PantaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pantai = DB::table('pantai')->get();
        $kecamatan = DB::table('covid')->get();
        return view('admin/pantai/index', compact('pantai', 'kecamatan'));
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
        if ($request->file('gambar')) {
            $gambar = $request->file('gambar')->store('image', 'public');
        } else {
            $gambar = NULL;
        }
        $getid = DB::table('pantai')->insertGetId([
            'nama' => $request->nama,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'id_kecamatan' => $request->id_kecamatan,
            'alamat' => $request->alamat,
            'gambar' => $gambar
        ]);
        DB::table('sentimen')->insert([
            'id_pantai' => $getid,
            's_positif' => NULL,
            's_negatif' => NULL,
            's_total' => NULL
        ]);
        $prokes = DB::table('prokes')->get();
        foreach ($prokes as $prokes){
            DB::table('prokes_pantai')->insert([
                'id_pantai' => $getid,
                'id_prokes' => $prokes->id,
                'status' => NULL,
            ]);
        }
        return redirect('/pantai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('pantai')->find($id);
        $kecamatan = DB::table('covid')->get();
        return view('admin/pantai/edit', compact('data', 'kecamatan'));
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
    public function update(Request $request)
    {
        $data = DB::table('pantai')->find($request->id);
        if ($request->hasFile('gambar')) {
            Storage::delete($data->gambar);
            $gambar = $request->file('gambar')->store('image', 'public');
        } else {
            $gambar = $data->gambar;
        }
        DB::table('pantai')
            ->where('id', $request->id)
            ->update([
                'nama' => $request->nama,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'id_kecamatan' => $request->id_kecamatan,
                'alamat' => $request->alamat,
                'gambar' => $gambar
            ]);
        return redirect('/pantai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('sentimen')->where('id_pantai', '=', $id)->delete();
        DB::table('prokes_pantai')->where('id_pantai', '=', $id)->delete();
        DB::table('pantai')->where('id', '=', $id)->delete();
        return redirect('/pantai');
    }
}
