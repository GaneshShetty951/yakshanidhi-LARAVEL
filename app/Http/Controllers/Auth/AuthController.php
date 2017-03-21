<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            ]);
    }


    /**
    * @param Request $request
    * @return \Illuminate\Http\RedirectResponse
    * @internal param Response $response
    **/
    protected function ajaxAuthenticate(Request $request)
    {
        If(Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')]))
        {
            //$urlIntended = $request->input('intendedUrl');
            return response()->json(["resource"=>["result"=>"Logged in!"]],200);
        }
        return response()->json(["resource"=>["error"=>"Credentials do not match, any of our records !"]],404);
    }


     /**
    * @param Request $request
    * @return \Illuminate\Http\RedirectResponse
    * @internal param Response $response
    **/
    protected function ajaxRegister(Request $request)
    {  
        // $validator = $this->validator(array($request->all()));
        $validator = Validator::make($request->all(), User::$rules);
        if ($validator->passes()) {
            //$this->throwValidationException($request, $validator);
            User::create(['name'=>$request->input('name'),'email'=>$request->input('email'),'password'=>bcrypt($request->input('password'))]);
            return response()->json(['message' => 'registration success'],200);
        }
        return response()->json(['message'=>'registration failure'],404);
    }
}
