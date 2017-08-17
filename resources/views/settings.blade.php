@extends('layouts.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active">Settings</li>
</ol>
@endsection

@section('content')
<form method="POST" action="{{ route('updateSettings') }}">
    {{ csrf_field() }}
    <div class="card">
        <div class="card-header">Settings</div>
        <div class="card-block">
            @if ($errors->any())
            <div class="alert alert-danger">
                There are some errors with your form input. Please check if all fields are correct and submit again.
            </div>
            @endif
            <ul class="nav nav-pills nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="general-tab" data-toggle="pill" href="#general" role="tab" aria-controls="general" aria-expanded="true">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="company-tab" data-toggle="pill" href="#company" role="tab" aria-controls="company" aria-expanded="false">Company</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" id="email-tab" href="#email" role="tab" aria-controls="email" aria-expanded="false">Email</a>
                </li>
            </ul>

            <div class="tab-content" id="tabContent">
                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="gemeral-tab">
                    <div class="row">
                        {{ $generator->load('settings/general.yml') }}
                        {!! $generator->render($data, $errors->toArray()) !!}
                    </div>
                </div>
                <div class="tab-pane fade" id="company" role="tabpanel" aria-labelledby="company-tab">
                    <div class="row">
                        {{ $generator->load('settings/company.yml') }}
                        {!! $generator->render($data, $errors->toArray()) !!}
                    </div>
                </div>
                <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
                    <div class="row">
                        {{ $generator->load('settings/email.yml') }}
                        {!! $generator->render($data, $errors->toArray()) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
        </div>
    </div>
</div>

@endsection
