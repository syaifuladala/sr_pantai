<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekomendasiController extends Controller
{
    public function index(){
        $max_covid = DB::table('covid')->max('positif');
        $min_covid = 0;
        $max_prokes = DB::table('prokes')->count();
        $min_prokes = 0;
        $max_sentimen = 100;
        $min_sentimen = 0;
        return view('rekomendasi', compact('max_covid','max_prokes','max_sentimen','min_covid','min_prokes','min_sentimen'));
    }
    public function hasil(Request $request){
        DB::table('fuzzy')->delete();
        $id_pantai = DB::table('pantai')->pluck('id');
        foreach ($id_pantai as $id) {
            DB::table('fuzzy')->insert([
                'id_pantai' => $id
            ]);   
        }

        $covid = DB::table('pantai')->join('covid', 'covid.id', '=', 'pantai.id_kecamatan')->pluck('positif');
        $data_sentimen = DB::table('sentimen')->get();
        foreach ($data_sentimen as $data_sentimen){
            $sentimen[] = round($data_sentimen->s_positif/$data_sentimen->s_total*100,2);
        }
        foreach ($id_pantai as $id) {
            $prokes[] = DB::table('prokes_pantai')->where('id_pantai',$id)->where('status',true)->count();
        }
        
        $this->linierturun($request->covidrendaha,$request->covidrendahb,$covid,'covid_rendah');
        $this->linierturun($request->sentimenburuka,$request->sentimenburukb,$sentimen,'sentimen_buruk');
        $this->linierturun($request->prokeslonggara,$request->prokeslonggarb,$prokes,'prokes_longgar');
        
        $this->liniernaik($request->covidtinggia,$request->covidtinggib,$covid,'covid_tinggi');
        $this->liniernaik($request->sentimenbaika,$request->sentimenbaikb,$sentimen,'sentimen_baik');
        $this->liniernaik($request->prokesketata,$request->prokesketatb,$prokes,'prokes_ketat');
        
        $this->segitiga($request->covidsedanga,$request->covidsedangb,$covid,'covid_sedang');
        $this->segitiga($request->sentimencukupa,$request->sentimencukupb,$sentimen,'sentimen_cukup');
        $this->segitiga($request->prokesstandara,$request->prokesstandarb,$prokes,'prokes_standar');
        
        $this->firestrength($request);

        $derajat_keanggotaan = DB::table('fuzzy')
            ->join('pantai', 'pantai.id', '=', 'fuzzy.id_pantai')
            ->get();
        $rekomendasi = DB::table('fuzzy')
            ->join('pantai', 'pantai.id', '=', 'fuzzy.id_pantai')
            ->orderBy('firestrength', 'desc')
            ->get();
        return view('hasil', compact('derajat_keanggotaan','request','rekomendasi'));
    }
    
    

    public function linierturun($a,$b,$x,$kriteria){
        $id = 0;
        foreach ($x as $x) {
            if ($x < $a) {
                $dk = 1;
            } elseif ($x > $b) {
                $dk = 0;
            } else {
                $dk = round(($b-$x)/($b-$a),2);
            }
            $id++;
            $this->simpan($dk, $kriteria, $id);
        }
        return;
    }

    public function liniernaik($a,$b,$x,$kriteria){
        $id = 0;
        foreach ($x as $x) {
            if ($x < $a) {
                $dk = 0;
            } elseif ($x > $b) {
                $dk = 1;
            } else {
                $dk = round(($x-$a)/($b-$a),2);
            }
            $id++;
            $this->simpan($dk, $kriteria, $id);
        }
        return;
    }
    
    public function segitiga($a,$c,$x,$kriteria){
        $b = ceil(($a+$c)/2);
        $id = 0;
        foreach ($x as $x) {
            if ($x == $b) {
                $dk = 1;
            } elseif ($x < $b && $x > $a) {
                $dk = round(($x-$a)/($b-$a),2);
            } elseif ($x < $c && $x > $b) {
                $dk = round(($c-$x)/($c-$b),2);
            } elseif ($x <= $a || $x >= $c) {
                $dk = 0;
            }
            $id++;
            $this->simpan($dk, $kriteria, $id);
        }
        return;
    }

    public function simpan($hasil, $kriteria, $id){
        DB::table('fuzzy')->where('id_pantai', $id)->update([$kriteria => $hasil]);
        return;
    }

    public function firestrength($request){
        $dk = DB::table('fuzzy')->get();
        if ($request->operator1 == 'and') {
            $this->and($dk,$request->covid,$request->prokes,'fscrank');
        }else{
            $this->or($dk,$request->covid,$request->prokes,'fscrank');
        }
        
        $dk2 = DB::table('fuzzy')->get();
        if ($request->operator2 == 'and') {
            $this->and($dk2,'fscrank',$request->sentimen,'firestrength');
        }else{
            $this->or($dk2,'fscrank',$request->sentimen,'firestrength');
        }
        
        return;
    }
    
    public function and($dk,$a,$b,$kriteria){
        foreach ($dk as $dk){
            $firestrength = min($dk->$a,$dk->$b);
            $this->simpan($firestrength,$kriteria,$dk->id_pantai);
        }
        return;
    }

    public function or($dk,$a,$b,$kriteria){
        foreach ($dk as $dk){
            $firestrength = max($dk->$a,$dk->$b);
            $this->simpan($firestrength,$kriteria,$dk->id_pantai);
        }
        return;
    }

    public function crank(){
        $firestrength = DB::table('fuzzy')
            ->join('pantai', 'pantai.id', '=', 'fuzzy.id_pantai')
            ->orderBy('firestrength', 'desc')
            ->get();
        $fscrank = DB::table('fuzzy')
            ->join('pantai', 'pantai.id', '=', 'fuzzy.id_pantai')
            ->orderBy('fscrank', 'desc')
            ->get();
        $jumlah = DB::table('fuzzy')->count();
        
        return view('crank', compact('firestrength','fscrank','jumlah'));
    }
}
