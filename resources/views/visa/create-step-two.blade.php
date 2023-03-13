@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('application.create.step.two.post') }}" method="POST" enctype='multipart/form-data'>
                @csrf

                <div class="card">
                    <div class="card-header">Step 2/3: Passport Info</div>

                    <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="passport_number">Passport Number:</label>
                                <input type="text" value="{{ $visa->passport_number ?? '' }}" class="form-control" id="passport_number"  name="passport_number">
                            </div>
                            <div class="form-group">
                                <label for="issuer">Issuer:</label>
                                <input type="text"  value="{{{ $visa->issuer ?? '' }}}" class="form-control" id="issuer" name="issuer"/>
                            </div>

                            <div class="form-group">
                                <label for="issue_date">Issue Date:</label>
                                <input type="date" value="{{{ $visa->issue_date ?? '' }}}" class="form-control" id="issueDate" name="issue_date"/>
                            </div>

                            <div class="form-group">
                                <label for="valid_until">Valid Until:</label>
                                <input type="date" value="{{{ $visa->valid_until ?? '' }}}" class="form-control" id="validUntil" name="valid_until"/>
                            </div>

                            <div class="form-group">
                                <label for="passport_photo">Passport Photo:</label>
                                <input type="file" class="form-control" id="passportPhoto" name="passport_photo"/>
                            </div>
                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
