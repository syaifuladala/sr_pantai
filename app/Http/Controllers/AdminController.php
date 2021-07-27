<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function login(){
        return view('admin/login');
    }

    public function admin(Request $request){
        if ($request->user == 'admin' && $request->pass == 'admin123') {
            return view('admin/index');
        } else {
            return view('admin/login');
        }
    }
}
