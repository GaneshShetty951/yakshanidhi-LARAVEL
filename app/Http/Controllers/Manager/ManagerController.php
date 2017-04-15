<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use Auth;
use App\Mela;
use App\Show;
use App\Prasangha;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ManagerController extends Controller
{
 	  public function __construct()
    {
        $this->middleware('auth');
    }

 	public function man_show_add()
 	{
 		if (Auth::user()->hasRole('manager')) {
            $id=Auth::user()->id;
            $mela=Mela::where('manager_id','=',$id)->first();
            $prasangha=Prasangha::pluck('prasangha_name');
            return view('manager.man_show_add',compact('mela','prasangha'));
        }else{
        	return redirect('/home');
        }	
 	}
 	public function man_show_update()
 	{
 		if(Auth::user()->hasRole('manager'))
   		{
   			$show=null;
   			$id=Auth::user()->id;
            $mela=Mela::where('manager_id','=',$id)->first();
   			return View('manager.man_show_update',compact('show','mela'));
   		}
   		else
   		{
   			return redirect('/home');
   		}
 	}
 	public function man_show_list()
 	{
 		if(Auth::user()->hasRole('manager'))
   		{
            $id=Auth::user()->id;
            $mela=Mela::where('manager_id','=',$id)->first();
   			$show=Show::where('mela_id','=',$mela->mela_id)->get();
   			return View('manager.man_show_list',compact('show','mela'));
   		}
   		else
   		{
   			return redirect('/home');
   		}
 	}
 	public function show_add_man(Request $request)
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

 	public function man_search_show(Request $request)
 	{
 		if(Auth::user()->hasRole('manager'))
 		{
 			$prasanghas=Prasangha::pluck('prasangha_name');
 			$id=Auth::user()->id;
            $mela=Mela::where('manager_id','=',$id)->first();
   			$show=Show::where('mela_id','=',$mela->mela_id)->where('show_date','=',$request->input('search_key'))->get();
        	if(count($show)<1)
        	{
        		return back()->with('errors_message', 'No records found !');
        	}
        	else
        	{
 				return view('manager.man_show_update',compact('show','prasanghas','mela'));
        	}
 		}
 	 	else
 	 	{
 	 		return redirect('/home');
 	 	}
 	}

 	public function man_show_update_add(Request $request)
 	{

   		if(Auth::user()->hasRole('manager'))
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
 	public function man_show_delete($id)
 	{
 		Show::where('show_id','=',$id)->delete();
 		return redirect('/man_show_list')->with('success','show Successfully Deleted');
 	}
 }
