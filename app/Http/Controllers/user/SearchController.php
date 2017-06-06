<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Mela;
use App\Artist;
use App\Show;
use DB;
use Session;
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
        session_start();
    	$_SESSION['KEYWORD']= $request->input('name');
    	return redirect('/search/artist_result');
    }
    public function artistSearcResult()
    {
        session_start();
        $mela=Mela::pluck('mela_name');
        $heading="Search result";
        $artist=Artist::select('artist_first_name')
                ->where('artist_first_name','LIKE','%'.$_SESSION['KEYWORD'].'%')
                ->simplePaginate(10);
        $single_artist=null;
        return View('user.searchartist',compact('mela','heading','artist','single_artist'));
    }
    public function showSingleArtist($first_name)
    {
    	$mela=Mela::pluck('mela_name');
        session_start();
    	$heading="Search result";
    	$artist=Artist::select('artist_first_name')
            ->where('artist_first_name','LIKE','%'.$_SESSION['KEYWORD'].'%')
            ->paginate(10);
    	$single_artist=Artist::where('artist_first_name','=',$first_name)->get();
    	return View('user.searchartist',compact('mela','heading','artist','single_artist'));
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
   		session_start();
        $_SESSION['KEYWORD']= $request->input('name');
   		return redirect('/search/prasangha_result');
   	}
    public function prasanghaSearchResult()
    {   
        session_start();
        $mela=Mela::pluck('mela_name');
        $prasangha=Prasangha::select('prasangha_name')
            ->where('prasangha_name','LIKE','%'.$_SESSION['KEYWORD'].'%')
            ->paginate(10);
        $name="Prasangha";
        $singleprasangha=null;
        return View('user.searchprasangha',compact('mela','prasangha','singleprasangha','name'));
    }
   	public function showSinglePrasangha($pname)
   	{
        session_start();
   		$mela=Mela::pluck('mela_name');
    	$prasangha=Prasangha::select('prasangha_name')
    		->where('prasangha_name','LIKE','%'.$_SESSION['KEYWORD'].'%')
    		->paginate(10); 
    	$name="Prasangha";
    	$singleprasangha=Prasangha::where('prasangha_name','=',$pname)->get();
    	return View('user.searchprasangha',compact('mela','prasangha','singleprasangha','name'));
   	}

    public function showMelaSearch()
    {
        $mela=Mela::pluck('mela_name');
        $mela1=null;
        $name="Prasangha";
        $singlemela=null;
        return View('user.searchmela',compact('mela','mela1','singlemela','name'));
    }
    public function insertSearchMela(Request $request)
    {
        session_start();
        $_SESSION['KEYWORD']= $request->input('name');
        return redirect('/search/mela_result');
    }
    public function melaSearchResult()
    {
        session_start();
        $mela=Mela::pluck('mela_name');
        $mela1=Mela::select('mela_name')
                ->where('mela_name','LIKE','%'.$_SESSION['KEYWORD'].'%')
                ->paginate(10);
        $name="Prasangha";
        $singlemela=null;
        return View('user.searchmela',compact('mela','mela1','singlemela','name'));
    }

    public function showSingleMela($pname)
    {
        session_start();
        $mela=Mela::pluck('mela_name');
        $mela1=Mela::select('mela_name')
                ->where('mela_name','LIKE','%'.$_SESSION['KEYWORD'].'%')
                ->paginate(10);
        $name="Prasangha";
        $singlemela=Mela::where('mela_name','=',$pname)->get();

        return View('user.searchmela',compact('mela','mela1','singlemela','name'));
    }
    public function showSearch()
    {
        $mela=Mela::pluck('mela_name');
        $p_name=null;
        $name="Prasangha";
        $show=null;
        $comments=null;
        return View('user.searchshow',compact('mela','p_name','show','name','comments'));
    }
    public function insertSearchShow(Request $request)
    {
        session_start();
        $_SESSION['KEYWORD']= $request->input('name');
        return redirect('/search/show_result');
    }

    public function searchShowResult()
    {
        session_start();
        $mela=Mela::pluck('mela_name');
        $p_name= DB::table('shows')
            ->join('melas', 'shows.mela_id', '=', 'melas.mela_id')
            ->join('prasanghas','shows.prasangha_id','=','prasanghas.prasangha_id')
            ->whereDate('show_date','=',$_SESSION['KEYWORD'])
            ->select('prasangha_name','show_id')->paginate(10);
        $name="Prasangha";
        $show=null;
        $comments=null;
        return View('user.searchshow',compact('mela','p_name','show','name','comments'));
    }
    public function showSingleShow($p_name,$id)
    {
        session_start();
        $mela=Mela::pluck('mela_name');
        $p_name= DB::table('shows')
            ->join('melas', 'shows.mela_id', '=', 'melas.mela_id')
            ->join('prasanghas','shows.prasangha_id','=','prasanghas.prasangha_id')
            ->whereDate('show_date','=',$_SESSION['KEYWORD'])
            ->select('prasangha_name','show_id')->paginate(10);
        $name="Prasangha";
        $show=DB::table('shows')
            ->join('melas', 'shows.mela_id', '=', 'melas.mela_id')
            ->join('prasanghas','shows.prasangha_id','=','prasanghas.prasangha_id')
            ->select('shows.*','melas.mela_name','melas.mela_pic','prasanghas.prasangha_name')
            ->where('show_id','=',$id)
            ->get();
        $comments=null;
        return View('user.searchshow',compact('mela','p_name','show','name','comments'));
    }

}
