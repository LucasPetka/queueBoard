@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard of {{ $specialist->name }}</div>

                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session()->get('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if(session()->has('info'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('info') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    
                    @if (count($appointments) > 0)
                        @foreach ($appointments as $appointment)
                            <li class="list-group-item">
                                <h4>#{{ $loop->index+1 }}</h4>
                                <p>Appointment number <b>{{ $appointment->appointment_number }} </b> registered at {{ $appointment->created_at }}</p>
                                
                                @if($loop->first)
                                    @if ($specialist->appointment != $appointment->appointment_number)
                                        <a href="/appointment/start/{{ $appointment->id }}" class="btn btn-success">Start appointment</a>
                                        <a href="/appointment/delete/{{ $appointment->id }}" class="btn btn-danger">Cancel</a>  
                                    @else
                                        <a href="/appointment/end/{{ $appointment->id }}" class="btn btn-secondary">End appointment</a>
                                    @endif
                                @endif
        
                            </li>
                        @endforeach
                    @else
                            <p class="text-muted">There are no appointments at the moment.</p>
                    @endif
                    
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
