<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use DB;
use App\Review;
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
    public function getComments($pname,$sid)
    {
        return response()->json(['posts'=>DB::table('reviews')
              ->join('users','users.id','=','reviews.user_id')
              ->join('shows','shows.show_id','=','reviews.show_id')
              ->select('reviews.*','users.name')
              ->where('reviews.show_id','=',$sid)
              ->orderBy('reviews.created_at','desc')->paginate(5)]);
    }
    public function saveComments(Request $request)
    {
        $this->validate($request,['comment'=>'required']);
        $review=new Review();
        $review->user_id=$request->input('user_id');
        $review->show_id=$request->input('show_id');
        $review->comment_text=$request->input('comment');
        $review->save();
        return response()->json(['message' => 'Comment saved'],200);
    }
    public function searchshow($date)
    {
         return response()->json(['posts'=>DB::table('shows')
            ->join('melas', 'shows.mela_id', '=', 'melas.mela_id')
            ->join('prasanghas','shows.prasangha_id','=','prasanghas.prasangha_id')
            ->whereDate('show_date','=',$date)
            ->select('shows.*','melas.mela_name','melas.mela_pic','prasanghas.prasangha_name')
            ->get()]);
    }
}
