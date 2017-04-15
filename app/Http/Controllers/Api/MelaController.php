<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Mela;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MelaController extends Controller
{
    public function show()
    {
   		return response()->json(['posts'=>Mela::all()]);
    }
}