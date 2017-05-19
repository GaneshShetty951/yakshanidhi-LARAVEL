    @extends('auth.auth_template')

    @section('content')

                    
                        <form class="login-form" role="form" method="POST" action="{{ url('/password/reset') }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row">
              <div class="input-field col s12 center">
                <img src="\material/img/Logo.ico" alt="" class="responsive-img valign profile-image-login">
                <p class="center login-form-text">Forgot Password</p>
              </div>
            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row margin" >

                                <div class="input-field col s12">
                                <i class="mdi-social-person-outline prefix"></i>
                                <input class="validate" id="email" type="email" name="email" placeholder="Email" value="{{ $email or old('email') }}">
                                <label for="email" data-error="wrong" data-success="right" class="center-align"></label>
            

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row margin">
                                
                                <div class="input-field col s12">
                                    <i class="mdi-action-lock-outline prefix"></i>
                <input id="password" type="password" class="validate" name="password" placeholder="Password" required>
                <label for="password"></label>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} row margin">
                            
                                <div class="input-field col s12">
                                    <i class="mdi-action-lock-outline prefix"></i>
                <input id="password-again" type="password" name="password_confirmation" placeholder="Confirm Password">
                <label for="password-again"></label>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <button type="submit" class="btn waves-effect waves-light col s12">
                                        <i class="fa fa-btn fa-refresh"></i> Reset Password
                                    </button>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <form class="login-form" role="form" method="POST" action="{{ url('/password/reset') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="token" value="{{ $token }}">
            <div class="row">
              <div class="input-field col s12 center">
                <img src="\material/img/Logo.ico" alt="" class="responsive-img valign profile-image-login">
                <p class="center login-form-text">Forgot Password</p>
              </div>
            </div>
            <div class="row margin">
              <div class="input-field col s12">
                <i class="mdi-social-person-outline prefix"></i>
                <input class="validate" id="email" type="email" name="email" placeholder="Email">
                <label for="email" data-error="wrong" data-success="right" class="center-align"></label>
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
                <button type="submit" class="btn waves-effect waves-light col s12" value="Recover my Password">Recover my Password</button>
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

          </form> -->
    @endsection
