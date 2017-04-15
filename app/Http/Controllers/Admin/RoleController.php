<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\Role;
use App\Mela;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function showrole()
    {
    	if($this->validate_users())
    	{
    		$role=null;
    		return View('admin.role_update',compact('role'));
    	}
    	else
    	{
    		return redirect('/home');
    	}
    }

    public function insertrole(Request $request)
    {
    	if($this->validate_users())
    	{
    		$role=User::where('email','=',$request->input('email'))->get();
            $melas=Mela::where('manager_id','=',1)->pluck('mela_name');
        
    		return View('admin.role_update',compact('role','melas'));
    	}
    	else
    	{
    		return redirect('/home');
    	}
    }
    public function delete($user_id)
    {
    	DB::table('role_user')->where([['role_id','=',Role::where('name','=','manager')->pluck('id')[0]],['user_id','=',$user_id]])->delete();
        Mela::where('manager_id','=',$user_id)->update(['manager_id'=>1]);
    	return back()->with('success','User Degraded to normal user !');
    }
    public function makemanager(Request $request)
    {
    	if($this->validate_users())
    	{
    		DB::table('role_user')->insert(['role_id'=>Role::where('name','=','manager')->pluck('id')[0],'user_id'=>$request->input('user_id')]);
            Mela::where('mela_name','=',$request->input('mela_name'))->update(['manager_id'=>$request->input('user_id')]);
    		return back()->with('success','User Migrated to manager');
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
