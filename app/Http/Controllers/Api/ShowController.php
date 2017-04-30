<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function show()
    {
    	 return response()->json(['posts'=>DB::table('shows')
            ->join('melas', 'shows.mela_id', '=', 'melas.mela_id')
            ->join('prasanghas','shows.prasangha_id','=','prasanghas.prasangha_id')
            ->whereDate('show_date','=',\Carbon\Carbon::now()->toDateString())
            ->select('shows.*','melas.mela_name','melas.mela_pic','prasanghas.prasangha_name')
            ->get()]);
    }
   
}
