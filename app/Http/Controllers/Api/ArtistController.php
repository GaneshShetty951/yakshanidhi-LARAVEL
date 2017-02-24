<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Artist;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArtistController extends Controller
{
    public function show()
    {
    	return response()->json(["posts"=>Artist::all()]);
    }
}
