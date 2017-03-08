<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
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
    		return View('admin.role_update',compact('role'));
    	}
    	else
    	{
    		return redirect('/home');
    	}
    }
    public function delete($user_id)
    {
    	DB::table('role_user')->where([['role_id','=',1],['user_id','=',$user_id]])->delete();
    	return back()->with('success','User Degraded to normal user !');
    }
    public function makemanager(Request $request)
    {
    	if($this->validate_users())
    	{
    		DB::table('role_user')->insert(['role_id'=>1,'user_id'=>$request->input('user_id')]);
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
