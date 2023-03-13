@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('application.create.step.three.post') }}" method="POST" enctype='multipart/form-data'>
                @csrf

                <div class="card">
                    <div class="card-header">Step 3/3: Residence Preferences Info</div>

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
                                <label for="departure_date">Departure Date:</label>
                                <input type="date" class="form-control" id="departure_date" name="departure_date"/>
                            </div>

                            <div class="form-group">
                                <label for="arrival_date">Arrival Date:</label>
                                <input type="date" class="form-control" id="arrival_date" name="arrival_date"/>
                            </div>

                            <div class="form-group">
                                <label for="extra_nights"> Extra Nights:</label>
                                <input type="number" class="form-control" id="extra_nights" name="extra_nights"/>
                            </div>

                            <div class="form-group">
                                <label for="">Room Types: </label>
                                <br>
                                    @foreach($roomTypes as $type)
                                        <input value="{{ $type->id }}" type="checkbox" name="rooms[]">{{$type->name}}<br>
                                    @endforeach
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
