<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Mela;
use App\Artist;
use App\Show;
use App\Prasangha;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
	public static $name=null;
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function showArtistSearch()
    {
    	$mela=Mela::pluck('mela_name');
    	$heading="Search Artist";
    	$artist=null;
    	$single_artist=null;
    	return View('user.searchartist',compact('mela','heading','artist','single_artist'));
    }
    public function insertSearchArtist(Request $request)
    {
    	SearchController::$name=$request->input('name');
    	$mela=Mela::pluck('mela_name');
    	$heading="Search result";
    	$artist=Artist::where('artist_first_name','LIKE','%'.$request->input('name').'%')->pluck('artist_first_name');
    	$single_artist=null;
    	return View('user.searchartist',compact('mela','heading','artist','single_artist'));
    }
    public function showSingleArtist($first_name)
    {
    	$mela=Mela::pluck('mela_name');
    	dd(SearchController::$name);
    	$heading="Search result";
    	$artist=Artist::where('artist_first_name','LIKE','%'.SearchController::$name.'%')->pluck('artist_first_name');
    	dd($artist);
    	$single_artist=Artist::where('artist_first_name','=',$first_name)->get();
    	// View('user.searchartist',compact('mela','heading','artist','single_artist'));
    }
    public function showPrasanghaSearch()
    {
    	$mela=Mela::pluck('mela_name');
    	$prasangha=null;
    	$name="Prasangha";
    	$singleprasangha=null;
    	return View('user.searchprasangha',compact('mela','prasangha','singleprasangha','name'));
    }
   	public function insertSearchPrasangha(Request $request)
   	{
   		SearchController::$name=$request->input('name');
   		$mela=Mela::pluck('mela_name');
    	$prasangha=Prasangha::select('prasangha_name')
    		->where('prasangha_name','LIKE','%'.$request->input('name').'%')
    		->paginate(10);
    	$name="Prasangha";
    	$singleprasangha=null;
    	return View('user.searchprasangha',compact('mela','prasangha','singleprasangha','name'));
   	}
   	public function showSinglePrasangha($pname)
   	{
   		$mela=Mela::pluck('mela_name');
    	$prasangha=Prasangha::select('prasangha_name')
    		->where('prasangha_name','LIKE','%'.SearchController::$name.'%')
    		->paginate(10);
    	$name="Prasangha";
    	$singleprasangha=Prasangha::where('prasangha_name','=',$pname)->get();
    	return View('user.searchprasangha',compact('mela','prasangha','singleprasangha','name'));
   	}
}
