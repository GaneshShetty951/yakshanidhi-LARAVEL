<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Artist;
use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;

class ArtistController extends Controller
{
    public function show()
    {
    	return response()->json(["posts"=>DB::table('artists')
            ->join('melas', 'artists.mela_id', '=', 'melas.mela_id')
            ->select('artists.*','melas.mela_name','melas.mela_pic')
            ->get()]);
    }
    public function searchartist($name)
    {
    	return response()->json(["posts"=>DB::table('artists')
            ->join('melas', 'artists.mela_id', '=', 'melas.mela_id')
            ->select('artists.*','melas.mela_name','melas.mela_pic')
            ->where('artist_first_name','LIKE','%'.$name.'%')
            ->paginate(5)]);
    }
}
