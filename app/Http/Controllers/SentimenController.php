<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class SentimenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sentimen = DB::table('sentimen')
            ->join('pantai', 'pantai.id', '=', 'sentimen.id_pantai')
            ->where('s_positif', '!=', NULL)
            ->get();
        $insert = DB::table('sentimen')
            ->join('pantai', 'pantai.id', '=', 'sentimen.id_pantai')
            ->where('sentimen.s_positif', '=', NULL)
            ->get();
        return view('admin/sentimen/index', compact('sentimen','insert'));
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
        // DB::table('sentimen')->insert([
        //     'id_pantai' => $request->id_pantai,
        //     's_positif' => $request->s_positif,
        //     's_negatif' => $request->s_negatif,
        //     's_total' => $request->s_total
        // ]);
        // return redirect('/sentimen');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('sentimen')
            ->join('pantai', 'pantai.id', '=', 'sentimen.id_pantai')
            ->find($id);
        return view('admin/sentimen/edit', compact('data'));
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
        DB::table('sentimen')
            ->where('id_pantai', $request->id_pantai)
            ->update([
                's_positif' => $request->s_positif,
                's_negatif' => $request->s_negatif,
                's_total' => $request->s_total
            ]);
        return redirect('/sentimen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pantai)
    {
        DB::table('sentimen')
            ->where('id_pantai', $id_pantai)
            ->update([
                's_positif' => NULL,
                's_negatif' => NULL,
                's_total' => NULL
            ]);
        return redirect('/sentimen');
    }
}
