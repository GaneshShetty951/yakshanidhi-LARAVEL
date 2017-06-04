<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Mela;
use App\Prasangha;
use App\Artist;
use App\Show;
use App\Review;
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
    	$mela=Mela::pluck('mela_name');
    	// $show = DB::table('shows')
     //        ->join('melas', 'shows.mela_id', '=', 'melas.mela_id')
     //        ->join('prasanghas','shows.prasangha_id','=','prasanghas.prasangha_id')
     //        ->get();
        $show=null;
        $p_name= DB::table('shows')
            ->join('melas', 'shows.mela_id', '=', 'melas.mela_id')
            ->join('prasanghas','shows.prasangha_id','=','prasanghas.prasangha_id')
            ->whereDate('show_date','=',\Carbon\Carbon::now()->toDateString())
            ->select('prasangha_name','show_id')->paginate(10);
            $comments=null;
    	return View('user.showforuser',compact('mela','show','p_name','comments'));
    }
    public function oneShow($name,$id)
    {
        $mela=Mela::pluck('mela_name');
        $show = DB::table('shows')
            ->join('melas', 'shows.mela_id', '=', 'melas.mela_id')
            ->join('prasanghas','shows.prasangha_id','=','prasanghas.prasangha_id')
            ->select('shows.*','melas.mela_name','melas.mela_pic','prasanghas.prasangha_name')
            ->where([['prasangha_name','=',$name],['show_id','=',$id]])
            ->whereDate('show_date','=',\Carbon\Carbon::now()->toDateString())
            ->get();
        $p_name= DB::table('shows')
            ->join('melas', 'shows.mela_id', '=', 'melas.mela_id')
            ->join('prasanghas','shows.prasangha_id','=','prasanghas.prasangha_id')
            ->whereDate('show_date','=',\Carbon\Carbon::now()->toDateString())
            ->select('prasangha_name','show_id')->paginate(10);
        $comments=DB::table('reviews')
              ->join('users','users.id','=','reviews.user_id')
              ->join('shows','shows.show_id','=','reviews.show_id')
              ->select('reviews.*','users.name')
              ->where('reviews.show_id','=',$id)
              ->orderBy('reviews.created_at','desc')->paginate(5);
        return View('user.showforuser',compact('mela','show','p_name','comments'));
    }
    public function saveComment(Request $request)
    {
      $this->validate($request,['comment'=>'required']);
      $review=new Review();
      $review->user_id=$request->input('user_id');
      $review->show_id=$request->input('show_id');
      $review->comment_text=$request->input('comment');
      $review->save();
      return back()->with('success','comment Successful');
    }
}
