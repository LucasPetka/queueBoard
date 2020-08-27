@extends('layouts.appNoLogin')

@section('content')
<div class="container  mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pick a specialist and reserve an appointment</div>

                <div class="card-body">

                    @if(session()->has('info'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('info') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session()->get('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif



                    @if (isset($appointment))
                    <p> 
                        Your current appointment number is <b><a href="/appointment/{{ $appointment->id }}">{{ $appointment->appointment_number }}</a></b> <br>
                        Specialist <b>{{ $appointment->user->name }}</b>
                    </p>
                    @endif

                    <ul class="list-group">
                        @foreach ($users as $user)
                            <li class="list-group-item">
                                {{ $user->name }}
                                <a href="/specialist/{{ $user->id }}/register" class="btn btn-success float-right">Reserve an appointment</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
