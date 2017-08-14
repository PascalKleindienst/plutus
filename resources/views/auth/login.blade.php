@extends('layouts.auth')

@section('content')
<div class="card-group">
    <div class="card">
        <div class="card-block">
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <h1>Login</h1>

                <p class="text-muted">Sign In to your account</p>
                <div class="input-group mb-3{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <span class="input-group-addon"><i class="icon-envelope"></i></span>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required autofocus>

                    @if ($errors->has('email'))
                        <span class="form-control-feedback">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="input-group mb-4{{ $errors->has('password') ? ' has-danger' : '' }}">
                    <span class="input-group-addon"><i class="icon-lock"></i></span>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' form-control-danger' : '' }}" name="password" placeholder="Password" required>

                    @if ($errors->has('password'))
                        <span class="form-control-feedback">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
