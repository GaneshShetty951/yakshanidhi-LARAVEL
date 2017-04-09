@extends('auth.auth_template')

<!-- Main Content -->
@section('content')
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<form class="login-form" method="POST" action="{{ url('/password/email') }}">
    {{ csrf_field() }}
    <div class="row">
      <div class="input-field col s12 center">
        <img src="\material/img/Logo.ico" alt="" class="responsive-img valign profile-image-login">
        <p class="center login-form-text">Forgot Password</p>
    </div>
</div>
<div class="row margin">
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      <div class="input-field col s12">
        <i class="mdi-social-person-outline prefix"></i>
        <input class="validate" id="email" type="email" name="email" placeholder="Email">
        <label for="email" data-error="wrong" data-success="right" class="center-align"></label>
    </div>
    @if ($errors->has('email'))
    <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
    @endif
</div>
</div>
<div class="row">
  <div class="input-field col s12">
    <button class="btn waves-effect waves-light col s12">Recover my Password</button>
</div>
</div>
<div class="row">
  <div class="input-field col s6 m6 l6">
    <p class="margin medium-small"><a href="{{ url('/register')}}">Register Now!</a></p>
</div>
<div class="input-field col s6 m6 l6">
  <p class="margin right-align medium-small"><a href="{{ url('/login')}}">Login</a></p>
</div>          
</div>

</form>
@endsection
