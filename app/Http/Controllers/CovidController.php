<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CovidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $covid = DB::table('covid')->get();
        return view('admin/covid/index', compact('covid'));
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
        DB::table('covid')->insert([
            'kecamatan' => $request->kecamatan,
            'positif' => $request->positif,
            'sembuh' => $request->sembuh,
            'meninggal' => $request->meninggal
        ]);
        return redirect('/covid');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('covid')->find($id);
        return view('admin/covid/edit', compact('data'));
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
        DB::table('covid')
            ->where('id', $request->id)
            ->update([
                'kecamatan' => $request->kecamatan,
                'positif' => $request->positif,
                'meninggal' => $request->meninggal,
                'sembuh' => $request->sembuh
            ]);
        return redirect('/covid');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('covid')->where('id', '=', $id)->delete();
        return redirect('/covid');
    }
}
