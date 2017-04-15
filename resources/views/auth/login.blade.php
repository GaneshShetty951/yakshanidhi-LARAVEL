        @extends('auth.auth_template')

        @section('content')

       <!--  <div class="col-sm-6 col-md-4 col-md-offset-4">
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
m
                        <div>
                            
                                <button class="loginBtn loginBtn--facebook"><a style="text-decoration: none;color: white;" href="{{ url('redirect/facebook')}}">
                                    Login with Facebook </a>
                                </button>
                           

                        </div>

                        <div>
                        <button class="loginBtn loginBtn--google"><a style="text-decoration: none;color: white;" href="{{ url('redirect/google')}}" >
                              Login with Google</a>
                          </button>
                      </div>



                  </form>


              </div>
          </div>
        </div> -->

        <form class="login-form" method="POST" role="form" action="{{ url('/login') }}">
          {{ csrf_field() }}

          <div class="row">
            <div class="input-field col s12 center">
              <img src="material/img/Logo.ico" alt="" class="responsive-img valign profile-image-login">
              <p class="center login-form-text">Welcome to Yakshanidhi</p>
            </div>
          </div>

          <div class="row margin">
            <div class="input-field col s12">
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <i class="mdi-social-person-outline prefix"></i>
                <input class="validate" id="email" name="email" type="email" placeholder="Email" required autofocus>
                <label for="email" data-error="wrong" data-success="right" class="center-align"></label>
                @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>
          </div>


          <div class="row margin">
            <div class="input-field col s12">
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <i class="mdi-action-lock-outline prefix"></i>
                <input id="password" type="password" name="password" placeholder="Password" required>
                <label for="password"></label>
                @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>
          </div>

          <div class="row">          
            <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" name="remember" id="remember-me" />
              <label for="remember-me">Remember me</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
              <button class="btn waves-effect waves-light col s12" type="submit" >Login</button>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s6 m6 l6">
              <p class="margin medium-small"><a href="{{ url('register')}}">Register Now</a></p>
            </div>
            <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="{{ url('/password/reset') }}">Forgot password</a></p>
            </div>          
          </div>
          <div class="row">
            <div class="input-field col s6 m6 l6">
              <a class="loginBtn loginBtn--facebook" href="{{ url('redirect/facebook')}}">
                                    Login with Facebook </a>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6 m6 l6">
              <a class="loginBtn loginBtn--facebook" href="{{ url('redirect/google')}}" >
                              Login with Google</a>
            </div>
          </div>

        </form>
        @endsection
