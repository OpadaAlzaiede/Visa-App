@extends('layouts.master')

@section('content')
<main class="login-form">
<div class="cotainer">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    Hello {{auth()->user()->name}}
            </div>
        </div>
    </div>
</div>
</main>
@endsection
