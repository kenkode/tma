@extends('layouts.main')

@section('content')
<div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-3">
                <h2 class="font-bold">TMA</h2>

                <p>
                    Welcome to project TMA
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                 
                 @if (Session::has('flash_message'))

                 <div class="alert alert-success">
                 {{ Session::get('flash_message') }}
                </div>
                 @endif

                    <form class="m-t" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                           
                            <input type="text" class="form-control" name="name" id="name" placeholder="Username or Email" value="{{ old('name') }}" required>
                       

                                
                            </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                          

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                        <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                                    </label>
                                </div>
                        </div>

                                <button type="submit" id="submit" class="btn btn-primary block full-width m-b">Login</button>

                                <a href="{{ url('/password/reset') }}">
                                    <small>Forgot Your Password?</small>
                                </a>

                                <p class="text-muted text-center">
                                <small>Do not have an account?</small>
                                </p>
                               <a class="btn btn-sm btn-white btn-block" href="{{ url('/register') }}">Create an account</a>
                    </form>
                    <p class="m-t">
                        <small>Copyright Upstridge©2017</small>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
