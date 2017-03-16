        @extends('auth.auth_template')

        @section('content')

        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="login-title text-center">Yakshanidhi</h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                alt="">
                <form class="form-signin" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <div class="md-form">
                            <i class="fa fa-envelope prefix"></i>
                            <input id="form8" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            <label for="form8">Email</label>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                        <div class="md-form">
                            <i class="fa fa-lock prefix"></i>
                            <input id=form2" type="password" class="form-control" name="password" required>
                            <label for="form2">Password</label>
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <label class="checkbox pull-left">
                        <input type="checkbox" value="remember-me">
                        Remember me
                    </label>
                    <a  href="{{ url('/password/reset') }}" class="pull-right need-help">Forgot Password ?</a><span class="clearfix"></span>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        Sign in</button><br/>

                        <div class="text-center">
                            <a class="btn btn-block btn-deep-purple" href="#">SIGN UP</a>
                        </div><br/>

                        <div>
                            <a href="{{ url('redirect/facebook')}}">
                                <button class="loginBtn loginBtn--facebook">
                                    Login with Facebook
                                </button>
                            </a>

                        </div>

                        <div>
                            <a href="{{ url('redirect/google')}}" ><button class="loginBtn loginBtn--google">
                              Login with Google
                          </button></a>
                      </div>



                  </form>
                  
                  
              </div>
          </div>
      </div>
      @endsection
