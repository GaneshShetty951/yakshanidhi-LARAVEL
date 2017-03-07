<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Mela;
use Auth;
use App\Prasangha;
use App\Show;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
   	public function showadd()
   	{
   		if($this->validate_users())
   		{
   			$mela=Mela::pluck('mela_name');
   			$prasangha=Prasangha::pluck('prasangha_name');
   			return View('admin.show_add',compact('mela','prasangha'));
   		}
   		else
   		{
   			return('/home');
   		}
   	}
   	public function add(Request $request)
   	{
   		$this->validate($request,[
   				'mela_name'=>'required',
   				'prasangha_name'=>'required',
   				'show_producer_name'=>'required|max:50',
   				'show_date'=>'required',
   				'show_time'=>'required',
   				'show_contact1'=>'required|min:10|max:10',
   				'show_contact2'=>'min:10|max:10',
   				'show_village'=>'required|max:50',
   				'show_taluk'=>'required|max:50',
   				'show_district'=>'required|max:50',
   				'show_pin'=>'required|min:6|max:6'
   			]);
   		$show=new Show();
   		$show->mela_id = Mela::where('mela_name','=',$request->input('mela_name'))->pluck('mela_id')[0];
   		$show->prasangha_id = Prasangha::where('prasangha_name','=',$request->input('prasangha_name'))->pluck('prasangha_id')[0];
   		$show->show_producer_name = $request->input('show_producer_name');
   		$show->show_date = $request->input('show_date');
   		$show->show_time = $request->input('show_time');
   		$show->contact_1 = $request->input('show_contact1');
   		$show->contact_2 = $request->input('show_contact2');
   		$show->village = $request->input('show_village');
   		$show->taluk = $request->input('show_taluk');
   		$show->district = $request->input('show_district');
   		$show->PINCODE = $request->input('show_pin');
   		$show->save();
   		return back()->with('success','Show Added Successfully');
   	}
   	public function update(Request $request)
   	{
   		if($this->validate_users())
   		{
   			$this->validate($request,[
   				'show_id'=>'required',
   				'mela_name'=>'required',
   				'prasangha_name'=>'required',
   				'show_producer_name'=>'required|max:50',
   				'show_date'=>'required',
   				'show_time'=>'required',
   				'show_contact1'=>'required|min:10|max:10',
   				'show_contact2'=>'min:10|max:10',
   				'show_village'=>'required|max:50',
   				'show_taluk'=>'required|max:50',
   				'show_district'=>'required|max:50',
   				'show_pin'=>'required|min:6|max:6'
   			]);
   			Show::where('show_id','=',$request->input('show_id'))->update([
   					'mela_id'=>Mela::where('mela_name','=',$request->input('mela_name'))->pluck('mela_id')[0],
   					'prasangha_id'=>Prasangha::where('prasangha_name','=',$request->input('prasangha_name'))->pluck('prasangha_id')[0],
   					'show_producer_name'=>$request->input('show_producer_name'),
   					'show_date'=>$request->input('show_date'),
   					'show_time'=>$request->input('show_time'),
   					'contact_1'=>$request->input('show_contact1'),
   					'contact_2'=>$request->input('show_contact2'),
   					'village'=>$request->input('show_village'),
   					'taluk'=>$request->input('show_taluk'),
   					'district'=>$request->input('show_district'),
   					'PINCODE'=>$request->input('show_pin')
   				]);
   			return back()->with('success','Show Updated Successfully');
   		}
   		else
   		{
   			return redirect('/home');
   		}
   	}

   	public function delete($id)
   	{
   		Show::where('show_id','=',$id)->delete();
 		return redirect('/show_list')->with('success','show Successfully Deleted');
   	}


   	public function showupdate()
   	{
   		if($this->validate_users())
   		{
   			$show=null;
   			return View('admin.show_update',compact('show'));
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
 			$show=Show::where('show_date','=',$request->input('search_key'))->get();
 			$prasanghas=Prasangha::pluck('prasangha_name');
 			$melas=Mela::pluck('mela_name');
        	if(count($show)<1)
        	{
        		return back()->with('errors_message', 'No records found !');
        	}
        	else
        	{
 				return view('admin.show_update',compact('show','prasanghas','melas'));
        	}
 		}
 	 	else
 	 	{
 	 		return redirect('/home');
 	 	}
   	}

   	public function show()
   	{
   		if($this->validate_users())
   		{
   			$show=Show::all();
   			return View('admin.show_list',compact('show'));
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
