<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Prokes_pantaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insert = DB::table('prokes_pantai')
            ->select('prokes_pantai.id_pantai', 'pantai.nama')
            ->join('pantai', 'pantai.id', '=', 'prokes_pantai.id_pantai')
            ->groupBy('prokes_pantai.id_pantai', 'pantai.nama')
            ->where('status', '=', NULL)
            ->get();
        $prokes_pantai = DB::table('prokes_pantai')
            ->join('pantai', 'pantai.id', '=', 'prokes_pantai.id_pantai')
            ->select('pantai.nama', DB::raw('count(*) as total_prokes, prokes_pantai.id_pantai'))
            ->where('prokes_pantai.status', '=', 1)
            ->groupBy('prokes_pantai.id_pantai', 'pantai.nama')
            ->orderBy('id_pantai', 'asc')
            ->get();

        return view('admin/prokes_pantai/index', compact('prokes_pantai', 'insert'));
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
        $prokes = DB::table('prokes')->get();
        foreach ($prokes as $prokes) {
            DB::table('prokes_pantai')
                ->where('id_pantai', $request->id_pantai)
                ->where('id_prokes', $prokes->id)
                ->update([
                    'status' => true
                ]);
        }
        return redirect('/prokes_pantai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('prokes_pantai')
            ->join('pantai', 'pantai.id', '=', 'prokes_pantai.id_pantai')
            ->join('prokes', 'prokes.id', '=', 'prokes_pantai.id_prokes')
            ->where('id_pantai', '=', $id)
            ->get();
        return view('admin/prokes_pantai/edit', compact('data'));
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
        DB::table('prokes_pantai')
            ->where('id_pantai', $request->id_pantai)
            ->where('id_prokes', $request->id_prokes)
            ->update([
                'status' => $request->status
            ]);
        return redirect('/prokes_pantai/' . $request->id_pantai);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pantai)
    {
        DB::table('prokes_pantai')
            ->where('id_pantai', $id_pantai)
            ->update([
                'status' => NULL
            ]);
        return redirect('/prokes_pantai');
    }
}
