@extends('layouts.appNoLogin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Appointment info</div>

                <div class="card-body">
                    <a href="/specialists/select" class="btn btn-secondary btn-sm mb-3">Back</a><br>
                    Your selected specialist is: <b>{{ $appointment->user->name }}</b><br>
                    Your appointment code is: <b>{{ $appointment->appointment_number }}</b><br>
                    You have {{ $customersInFrontOfLine }} people in front of you in line and approximately {{ $customersInFrontOfLine * 7 }} min of waiting.

                    <a class="btn btn-danger float-right" href="/appointment/cancel/{{ $appointment->id }}"> Cancel appointment</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
