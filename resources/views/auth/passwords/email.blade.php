@extends('layouts.auth')

@section('content')
<div class="card-group">
    <div class="card">
        <div class="card-block">
            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <h1>Reset Password</h1>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="input-group mb-3{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <span class="input-group-addon"><i class="icon-envelope"></i></span>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required autofocus>

                    @if ($errors->has('email'))
                        <span class="form-control-feedback">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="col-md-6 col-md-offset-4">
                    <div class="row">
                    <button type="submit" class="btn btn-primary">
                        Send Password Reset Link
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
