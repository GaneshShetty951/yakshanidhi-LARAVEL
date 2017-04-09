@extends('auth.auth_template')

@section('content')



   <!--  <form class="form-signin" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}

        <div class="card-block">

            
            <div class="text-center">
                <h3 class="login-title">Yakshanidhi </h3>
            </div>
            <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">

       
            <div class="md-form {{ $errors->has('name') ? ' has-error' : '' }}">
                <i class="fa fa-user prefix"></i>
                <input type="text" id="form3" name="name" class="form-control">
                <label for="form3">Your name</label>
                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>

            <div class="md-form {{ $errors->has('email') ? ' has-error' : '' }}">
                <i class="fa fa-envelope prefix"></i>
                <input type="text" id="form2" name="email" class="form-control">
                <label for="form2">Your email</label>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <div class="md-form {{ $errors->has('password') ? ' has-error' : '' }}">
                <i class="fa fa-lock prefix"></i>
                <input type="password" id="form32"name="password" class="form-control">
                <label for="form34">Your Password</label>
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>

            <div class="md-form {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <i class="fa fa-pencil prefix"></i>
                <input type="password" id="form8" name="password_confirmation" class="form-control"></input>
                <label for="form8">Re-write Password</label>
                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
            </div>

            <button type="submit" class="btn btn-block btn-deep-purple" align="center">Sign Up</button>
        </center>
    </form> -->

    <form class="login-form" method="POST" action="{{ url('/register') }}">
     {{ csrf_field() }}
        <div class="row">
          <div class="input-field col s12 center">
            <img src="material/img/Logo.ico" alt="" class="responsive-img valign profile-image-login">
            <p class="center login-form-text">Welcome to Yakshanidhi</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" type="text" class="validate" name="name" placeholder="User name" required>
            <label for="username" class="center-align"></label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-communication-email prefix"></i>
            <input id="email" type="email" class="validate" name="email" placeholder="Email" required>
            <label for="email" class="center-align"></label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password" class="validate" name="password" placeholder="Password" required>
            <label for="password"></label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password-again" type="password" name="password_confirmation" placeholder="Confirm Password">
            <label for="password-again"></label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button class="btn waves-effect waves-light col s12" type="submit">Register Now</button>
          </div>
          <div class="input-field col s12">
            <p class="margin center medium-small sign-up">Already have an account?<a href="{{url('/login')}}">Login</a></p>
          </div>
        </div>
      </form>

    @endsection
