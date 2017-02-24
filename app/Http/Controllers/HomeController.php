<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;
use App\Mela;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('admin'))
        {
            $mela=Mela::all();
            return view('admin.mela_list',compact('mela'));
        }
        return view('home');
    }
}
