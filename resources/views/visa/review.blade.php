@extends('layouts.master')

@section('content')
<main class="login-form">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="mt-4 ml-5">Review Your Application</h4>
                <br><br>
            </div>
            <div class="card">
                    <div class="card-header">Step 1/3: Personal Info</div>

                    <div class="card-body">
                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" value="{{ $visa->first_name ?? '' }}" class="form-control" id="firstName"  name="first_name" disabled>
                            </div>
                            <div class="form-group">
                                <label for="father_name">Father Name:</label>
                                <input type="text"  value="{{{ $visa->father_name ?? '' }}}" class="form-control" id="fatherName" name="father_name" disabled/>
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" value="{{{ $visa->last_name ?? '' }}}" class="form-control" id="lastName" name="last_name"disabled/>
                            </div>

                            <div class="form-group">
                                <label for="job">Job:</label>
                                <input type="text" value="{{{ $visa->job ?? '' }}}" class="form-control" id="job" name="job" disabled/>
                            </div>


                            <div class="form-group">
                                <label for="arrival_date">Arrival Date:</label>
                                <input type="date" value="{{{ $visa->arrival_date ?? '' }}}" class="form-control" id="arrival_date" name="arrival_date" disabled/>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Step 2/3: Passport Info</div>

                    <div class="card-body">

                            <div class="form-group">
                                <label for="passport_number">Passport Number:</label>
                                <input type="text" value="{{ $visa->passport_number ?? '' }}" class="form-control" id="passport_number"  name="passport_number" disabled>
                            </div>
                            <div class="form-group">
                                <label for="issuer">Issuer:</label>
                                <input type="text"  value="{{{ $visa->issuer ?? '' }}}" class="form-control" id="issuer" name="issuer" disabled/>
                            </div>

                            <div class="form-group">
                                <label for="issue_date">Issue Date:</label>
                                <input type="date" value="{{{ $visa->issue_date ?? '' }}}" class="form-control" id="issueDate" name="issue_date" disabled/>
                            </div>

                            <div class="form-group">
                                <label for="valid_until">Valid Until:</label>
                                <input type="date" value="{{{ $visa->valid_until ?? '' }}}" class="form-control" id="validUntil" name="valid_until" disabled />
                            </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Step 3/3: Residence Preferences Info</div>

                    <div class="card-body">
                            <div class="form-group">
                                <label for="departure_date">Departure Date:</label>
                                <input value="{{{ $residencePrefernce->departure_date ?? '' }}}"  type="date" class="form-control" id="departure_date" name="departure_date" disabled/>
                            </div>

                            <div class="form-group">
                                <label for="arrival_date">Arrival Date:</label>
                                <input value="{{{ $residencePrefernce->arrival_date ?? '' }}}" type="date" class="form-control" id="arrival_date" name="arrival_date" disabled/>
                            </div>

                            <div class="form-group">
                                <label for="extra_nights"> Extra Nights:</label>
                                <input value="{{{ $residencePrefernce->extra_nights ?? '' }}}" type="number" class="form-control" id="extra_nights" name="extra_nights" disabled/>
                            </div>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('application.submit') }}" method="POST">
                            @csrf
                            <button class="btn btn-primary pull-right" type="submit">
                                Apply
                            </button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
</main>
@endsection
