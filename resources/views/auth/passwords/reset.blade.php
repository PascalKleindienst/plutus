@extends('layouts.auth')

@section('content')
<div class="card-group">
    <div class="card">
        <div class="card-block">
            <form method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">

                <h1>Reset Password</h1>


                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="input-group mb-3{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <span class="input-group-addon"><i class="icon-envelope"></i></span>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}" name="email" value="{{ $email or old('email') }}" placeholder="E-Mail Address" required autofocus>

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

                <label for="confirm_password">Confirm Password</label>
                <div class="input-group mb-4{{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                    <span class="input-group-addon"><i class="icon-lock"></i></span>
                    <input id="confirm_password" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' form-control-danger' : '' }}" name="password" placeholder="Confirm Password" required>

                    @if ($errors->has('password_confirmation'))
                        <span class="form-control-feedback">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">
                            Reset Password
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
