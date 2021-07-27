<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $pantai = DB::table('pantai')
            ->select('pantai.id','nama','latitude','longitude','alamat','positif','s_positif','gambar','s_total')
            ->join('covid', 'covid.id', '=', 'pantai.id_kecamatan')
            ->join('sentimen', 'sentimen.id_pantai', '=', 'pantai.id')
            ->get();
        $max_pantai = DB::table('pantai')->count();
        $max_covid = DB::table('covid')->max('positif');
        $max_prokes = DB::table('prokes')->count();
        $max_sentimen = 100;
        $jml_prokes = []; $i = 0;
        while ($i < $max_pantai){
            $jml_prokes[$i+1] = DB::table('prokes_pantai')
                ->where('id_pantai',$i+1)
                ->where('status',true)
                ->count();
            $i++;
        }
        return view('home', compact('pantai','jml_prokes','max_covid','max_prokes','max_sentimen'));
    }

    public function detail($id)
    {
        $pantai = DB::table('pantai')
            ->join('covid', 'covid.id', '=', 'pantai.id_kecamatan')
            ->join('sentimen', 'sentimen.id_pantai', '=', 'pantai.id')
            ->where('pantai.id',$id)
            ->get();
        $prokes = DB::table('prokes')->get();
        $prokes_pantai = DB::table('prokes_pantai')->where('id_pantai',$id)->get();
        // dd($prokes_pantai);
        return view('detail', compact('pantai','prokes','prokes_pantai'));
    }
}
