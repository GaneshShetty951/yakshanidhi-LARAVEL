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
        return view('home');
    }

    public function admin()
    {
        if(Auth::user()->hasRole('admin'))
        {
            $mela=Mela::all();
            return view('admin.mela_list',compact('mela'));
        }elseif (Auth::user()->hasRole('manager')) {
            return redirect('/manager');
        }
    }
}
