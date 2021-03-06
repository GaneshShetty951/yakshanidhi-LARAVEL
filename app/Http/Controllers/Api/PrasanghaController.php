<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Prasangha;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PrasanghaController extends Controller
{
    public function show()
    {
   		return response()->json(['posts'=>Prasangha::orderBy('prasangha_year','desc')->get()]);
    }
    public function searchprasangha($name)
    {
   		return response()->json(['posts'=>Prasangha::where('prasangha_name','LIKE','%'.$name.'%')->orderBy('prasangha_year','desc')->paginate(5)]);
    }
}
