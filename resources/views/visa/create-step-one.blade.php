@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('application.create.step.one.post') }}" method="POST" enctype='multipart/form-data'>
                @csrf

                <div class="card">
                    <div class="card-header">Step 1/3: Personal Info</div>

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
                                <label for="first_name">First Name:</label>
                                <input type="text" value="{{ $visa->first_name ?? '' }}" class="form-control" id="firstName"  name="first_name">
                            </div>
                            <div class="form-group">
                                <label for="father_name">Father Name:</label>
                                <input type="text"  value="{{{ $visa->father_name ?? '' }}}" class="form-control" id="fatherName" name="father_name"/>
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" value="{{{ $visa->last_name ?? '' }}}" class="form-control" id="lastName" name="last_name"/>
                            </div>

                            <div class="form-group">
                                <label for="job">Job:</label>
                                <input type="text" value="{{{ $visa->job ?? '' }}}" class="form-control" id="job" name="job"/>
                            </div>

                            <div class="form-group">
                                <select name="visa_type_id" id="visaType">
                                    <option value="">Please Select Visa Type: </option>
                                    @foreach($visaTypes as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="arrival_date">Arrival Date:</label>
                                <input type="date" value="{{{ $visa->arrival_date ?? '' }}}" class="form-control" id="arrival_date" name="arrival_date"/>
                            </div>

                            <div class="form-group">
                                <label for="personal_photo">Personal Photo:</label>
                                <input type="file" class="form-control" id="personal_photo" name="personal_photo"/>
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
