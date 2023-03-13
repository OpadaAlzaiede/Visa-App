@extends('layouts.master')

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">visa types</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">room types</a>
        </li>
    </ul>
</div>
@section('content')
<main class="login-form">
<div class="cotainer">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    Admin
            </div>
        </div>
    </div>
</div>
</main>
@endsection
