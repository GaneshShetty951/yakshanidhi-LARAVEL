<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Prasangha;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PrasanghaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function showadd()
	{
		if($this->validate_users())
 		{
			return view('admin.prasangha_add');
		}
		else
		{
			return redirect('/home');
		}
	}

	public function add(Request $request)
	{
		$this->validate($request,[
			'prasangha_name'=>'required|max:50',
			'prasangha_author'=>'required|max:50',
			'prasangha_year'=>'required|min:4|max:4'
			]);
		$prasangha=new Prasangha();
		$prasangha->prasangha_name=$request->input('prasangha_name');
		$prasangha->prasangha_author=$request->input('prasangha_author');
		$prasangha->prasangha_year=$request->input('prasangha_year');
		$prasangha->save();
		return back()->with('success','Prasangha Added Successfully !');
	}

	public function update(Request $request)
	{
		$this->validate($request,[
			'prasangha_id'=>'required',
			'prasangha_name'=>'required|max:50',
			'prasangha_author'=>'required|max:50',
			'prasangha_year'=>'required|min:4|max:4'
			]);
		Prasangha::where('prasangha_id','=',$request->input('prasangha_id'))->update([
			'prasangha_name'=>$request->input('prasangha_name'),
			'prasangha_author'=>$request->input('prasangha_author'),
			'prasangha_year'=>$request->input('prasangha_year')
			]);
		return back()->with('success','Prasangha updated Successfully !');
	}

	public function delete($id)
 	{
 		Prasangha::where('prasangha_id','=',$id)->delete();
 		return redirect('/prasangha_list')->with('success','Prasangha Successfully Deleted');
 	}


	public function show()
	{
		if($this->validate_users())
 		{
			$prasangha=Prasangha::all();
			return view('admin.prasangha_list',compact('prasangha'));
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
 			$prasangha=null;
 			return view('admin.prasangha_update',compact('prasangha'));
 		}
 	 	else
 	 	{
 	 		return redirect('/home');
 	 	}
 	}

 	public function insertupdate(Request $request)
 	{
 		if($this->validate_users())
 		{
 			$prasangha=Prasangha::where('prasangha_name','LIKE','%'.$request->input('search_key').'%')
 			->orWhere('prasangha_author','LIKE','%'.$request->input('search_key').'%')
 			->orWhere('prasangha_year','LIKE','%'.$request->input('search_key').'%')->get();
        	if(count($prasangha)<1)
        	{
        		return back()->with('errors_message', 'No records found !');
        	}
        	else
        	{
 				return view('admin.prasangha_update',compact('prasangha'));
        	}
 		}
 	 	else
 	 	{
 	 		return redirect('/home');
 	 	}
 	}  

	public function validate_users(){
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
