@extends('layouts.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
</ol>
@endsection

@section('content')
<div class="animated fadeIn">
    <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-block">
            You are logged in!
        </div>
    </div>
</div>
@endsection
