<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Auth;
use App\Artist;
use App\Mela;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArtistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function show()
   	{
   		if($this->validate_users())
   		{
   			$artist=Artist::all();
   			return View('admin.artist_list',compact('artist'));
   		}
   		else
   		{
   			return redirect('/home');
   		}
   	}
   	
   	public function add(Request $request)
   	{
   		if($this->validate_users())
   		{
   			$this->validate($request,[
   					'mela_name'=>'required|max:50',
   					'artist_first_name'=>'required|max:50',
   					'artist_second_name'=>'required|max:50',
   					'artist_pic'=>'required|image|mimes:jpg,png,jpeg',
   					'artist_type'=>'required',
   					'artist_place'=>'required|max:50'
   				]);
   			$artist=new Artist();
   			$artist->mela_id =  Mela::where('mela_name','=',$request->input('mela_name'))->pluck('mela_id')[0];
   			$artist->artist_first_name = $request->input('artist_first_name');
   			$artist->artist_second_name = $request->input('artist_second_name');
   			$artist->artist_type = $request->input('artist_type');
   			$artist->artist_place = $request->input('artist_place');
   			if($request->hasFile('artist_pic')) {
            	$file = $request->file('artist_pic');
            	//getting timestamp
        	    $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            
    	        $name = $timestamp. '-' .$file->getClientOriginalName();
            
	            $artist->artist_pic = $name;

            	$file->move(public_path().'/artist_images/', $name);
        	} 
        	$artist->save();
        	return back()->with('success','Artist Successfully Added');
   		}
   		else
   		{
   			redirect('/home');
   		}
   	}

    public function delete($id)
    {
        Artist::where('artist_id','=',$id);
       return redirect('/artist_list')->with('success','show Successfully Deleted');
    }

   	public function showadd()
   	{
   		if($this->validate_users())
   		{
   			$mela=Mela::pluck('mela_name');
   			return View('admin.artist_add',compact('mela'));
   		}
   		else
   		{
   			return redirect('/home');
   		}
   	}

   	public function showupdate()
   	{
   		if($this->validate_users())
   		{
   			$artist=null;
   			return View('admin.artist_update',compact('artist'));
   		}
   		else
   		{
   			return redirect('/home');
   		}
   	}

   	public function update(Request $request)
   	{
   		if($this->validate_users())
   		{
   			$this->validate($request,[
   					'artist_id'=>'required',
   					'mela_name'=>'required|max:50',
   					'artist_first_name'=>'required|max:50',
   					'artist_second_name'=>'required|max:50',
   					'artist_pic'=>'image|mimes:jpg,png,jpeg',
   					'artist_type'=>'required',
   					'artist_place'=>'required|max:50'
   				]);
   			$name=null;
			if($request->hasFile('artist_pic')) {
            	$file = $request->file('artist_pic');
            	//getting timestamp
            	$timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            
            	$name = $timestamp. '-' .$file->getClientOriginalName();
            
            	$file->move(public_path().'/artist_images/', $name);
        	}
        	else
        	{
        		$name=Artist::where('artist_id','=',$request->input('artist_id'))->pluck('artist_pic')[0];
        	}
   			Artist::where('artist_id','=',$request->input('artist_id'))->update([
   					'mela_id'=>Mela::where('mela_name','=',$request->input('mela_name'))->pluck('mela_id')[0],
   					'artist_first_name'=>$request->input('artist_first_name'),
   					'artist_second_name'=>$request->input('artist_second_name'),
   					'artist_pic'=>$name,
   					'artist_type'=>$request->input('artist_type'),
   					'artist_place'=>$request->input('artist_place')
   				]);
        	return back()->with('success','Artist Successfully Updated');
   		}
   		else
   		{
   			redirect('/home');
   		}
   	}

	public function insertupdate(Request $request)
   	{
   		if($this->validate_users())
 		{
 			$artist=Artist::where('artist_first_name','LIKE','%'.$request->input('search_key').'%')->get();
 			$melas=Mela::pluck('mela_name');
        	if(count($artist)<1)
        	{
        		return back()->with('errors_message', 'No records found !');
        	}
        	else
        	{
 				return view('admin.artist_update',compact('artist','melas'));
        	}
 		}
 	 	else
 	 	{
 	 		return redirect('/home');
 	 	}
   	}
   private function validate_users(){
 		if(Auth::user()->hasRole('admin'))
 		{
 			return true;
 		}
 		else
 		{
 			return false;
 		}
 	}
}
