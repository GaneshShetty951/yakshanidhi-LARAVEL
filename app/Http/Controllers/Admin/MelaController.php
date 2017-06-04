<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Mela;
use App\User;
use App\Role;
use Auth;
use DB;
use Carbon\Carbon;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MelaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
 	public function showadd()
 	{
 		if($this->validate_users())
 		{
            $u_id=array_unique(Mela::pluck('manager_id')->toArray());
            $users=User::whereNotIn('id',$u_id)->pluck('email');
 			return view('admin.mela_add',compact('users'));
 		}
 	 	else
 	 	{
 	 		return redirect('/home');
 	 	}
 	}

 	public function add(Request $request)
 	{
 		$this->validate($request,[
 				'mela_name'=>'required|max:50|unique:melas',
 				'mela_pic'=>'required|image|mimes:jpg,jpeg,png',
 				'mela_email'=>'required|unique:melas',
 				'contact'=>'required|min:6|max:12|unique:melas',
 				'mela_village'=>'required|max:50',
 				'mela_taluk'=>'required|max:50',
 				'mela_district'=>'required|max:50',
 				'mela_pin'=>'required|min:6|max:6'
 			]);
 		$mela=new Mela();
        if(User::where('email','=',$request->input('man_email'))->first()){
        $mela->manager_id=User::where('email','=',$request->input('man_email'))->first()->pluck('id');
        }else{
             $mela->manager_id=null;
        }
        $mela->mela_name = $request->input('mela_name');
        $mela->mela_email = $request->input('mela_email');
        $mela->contact = $request->input('contact');
        $mela->village = $request->input('mela_village');
        $mela->taluk = $request->input('mela_taluk');
        $mela->district = $request->input('mela_district');
        $mela->PINCODE = $request->input('mela_pin');
		if($request->hasFile('mela_pic')) {
            $file = $request->file('mela_pic');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            
            $name = $timestamp. '-' .$file->getClientOriginalName();
            
            $mela->mela_pic = $name;

            $file->move(public_path().'/mela_images/', $name);
        }
     	 $mela->save();
        if(User::where('email',$request->input('man_email'))->get()->first()){
         DB::table('role_user')->insert(['role_id'=>Role::where('name','manager')->get()->first()->pluck('id')[0],'user_id'=>User::where('email','=',$request->input('man_email'))->first()->pluck('id')[0]]);
     }
     	 //Session::flash('success','Mela Successfully Added');
         return back()->with('success','Mela Successfully Added');
 	}

 	public function update(Request $request)
 	{
 		$this->validate($request,[
 				'mela_id'=>'required',
 				'mela_name'=>'required|max:50',
 				'mela_pic'=>'image|mimes:jpg,jpeg,png',
 				'mela_email'=>'required',
 				'mela_contact'=>'required|min:6|max:12',
 				'mela_village'=>'required|max:50',
 				'mela_taluk'=>'required|max:50',
 				'mela_district'=>'required|max:50',
 				'mela_pin'=>'required|min:6|max:6'
 			]);
 		$name=null;
		if($request->hasFile('mela_pic')) {
            $file = $request->file('mela_pic');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            
            $name = $timestamp. '-' .$file->getClientOriginalName();
            
            $file->move(public_path().'/mela_images/', $name);
        }
        else
        {
        	$name=Mela::where('mela_id','=',$request->input('mela_id'))->pluck('mela_pic')[0];
        }

        Mela::where('mela_id','=',$request->input('mela_id'))->update([
 					'mela_name'=>$request->input('mela_name'),
 					'mela_pic'=>$name,
 					'mela_email'=>$request->input('mela_email'),
 					'contact'=>$request->input('mela_contact'),
 					'village'=>$request->input('mela_village'),
 					'taluk'=>$request->input('mela_taluk'),
 					'district'=>$request->input('mela_district'),
 					'PINCODE'=>$request->input('mela_pin') 					
 			]);
         return back()->with('success','Mela Successfully Updated');
 	}

 	public function delete($id)
 	{
 		Mela::where('mela_id','=',$id)->delete();
 		return redirect('/mela_list')->with('success','Mela Successfully Deleted');
 	}

 	public function showupdate()
 	{
 		if($this->validate_users())
 		{
 			$mela=null;
 			return view('admin.mela_update',compact('mela'));
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
 			$mela=Mela::where('mela_name','LIKE','%'.$request->input('search_key').'%')->get();
        	if(count($mela)<1)
        	{
        		return back()->with('errors_message', 'No records found !');
        	}
        	else
        	{
 				return view('admin.mela_update',compact('mela'));
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
 	 		$mela=Mela::all();
 	 		return view('admin.mela_list', compact('mela'));
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
