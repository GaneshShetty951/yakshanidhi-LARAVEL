<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Mela;
use App\Prasangha;
use App\Artist;
use App\Show;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showSinglePrasangha($name)
    {
    	$mela=Mela::pluck('mela_name');
    	$prasangha=Prasangha::pluck('prasangha_name');
    	$singleprasangha=Prasangha::where('prasangha_name','=',$name)->get();
    	return View('user.prasanghaforuser',compact('mela','prasangha','singleprasangha','name'));
    }

    public function showPrasangha()
    {
    	$mela=Mela::pluck('mela_name');
    	$prasangha=Prasangha::pluck('prasangha_name');
    	$name="Prasangha";
    	$singleprasangha=null;
    	return View('user.prasanghaforuser',compact('mela','prasangha','singleprasangha','name'));
    }
    public function melaList($name)
    {
    	$mela=Mela::pluck('mela_name');
    	$singlemela=Mela::where('mela_name','=',$name)->get();
    	return View('user.melaforuser',compact('mela','name','singlemela'));
    }
    public function melaBhagvataru()
    {
    	$mela=Mela::pluck('mela_name');
    	$heading="bhagavataru";
    	$artist=Artist::where('artist_type','=','bhagavata')->pluck('artist_first_name');
    	$single_artist=null;
    	return View('user.artistforuser',compact('mela','heading','artist','single_artist'));
    }
    public function melaVeshadhari()
    {
    	$mela=Mela::pluck('mela_name');
    	$heading="veshadhari";
    	$artist=Artist::where('artist_type','=','veshadari')->pluck('artist_first_name');
    	$single_artist=null;
    	return View('user.artistforuser',compact('mela','heading','artist','single_artist'));
    }
    public function melaChande()
    {
    	$mela=Mela::pluck('mela_name');
    	$heading="chande";
    	$artist=Artist::where('artist_type','=','chande')->pluck('artist_first_name');
    	$single_artist=null;
    	return View('user.artistforuser',compact('mela','heading','artist','single_artist'));
    }
    public function melaMaddale()
    {
    	$mela=Mela::pluck('mela_name');
    	$heading="maddale";
    	$artist=Artist::where('artist_type','=','maddale')->pluck('artist_first_name');
    	$single_artist=null;
    	return View('user.artistforuser',compact('mela','heading','artist','single_artist'));
    }
    public function singleArtist($header,$artist_name)
    {
    	$mela=Mela::pluck('mela_name');
    	if($header=="bhagavataru")
    	{
    		$heading="bhagavataru";
    		$artist=Artist::where('artist_type','=','bhagavata')->pluck('artist_first_name');
    		$single_artist=Artist::where([['artist_type','=','bhagavata'],['artist_first_name','=',$artist_name]])->get();
    	}
    	else if($header=="veshadhari")
    	{
    		$heading="veshadhari";
    		$artist=Artist::where('artist_type','=','veshadari')->pluck('artist_first_name');
    		$single_artist=Artist::where([['artist_type','=','veshadari'],['artist_first_name','=',$artist_name]])->get();
    	}
    	else if($header=="chande")
    	{
    		$heading="chande";
    		$artist=Artist::where('artist_type','=','chande')->pluck('artist_first_name');
    		$single_artist=Artist::where([['artist_type','=','chande'],['artist_first_name','=',$artist_name]])->get();
    	}
    	else if($header=="maddale")
    	{
    		$heading="maddale";
    		$artist=Artist::where('artist_type','=','maddale')->pluck('artist_first_name');
    		$single_artist=Artist::where([['artist_type','=','maddale'],['artist_first_name','=',$artist_name]])->get();
    	}
    	return View('user.artistforuser',compact('mela','heading','artist','single_artist'));
    }

    public function todayShow()
    {
    	$show = DB::table('shows')
            ->join('melas', 'shows.mela_id', '=', 'melas.mela_id')
            ->join('prasanghas','shows.prasangha_id','=','prasanghas.prasangha_id')
            ->get();
    	dd($show);
    }
}
