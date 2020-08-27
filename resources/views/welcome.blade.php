@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4 class="text-center">For customers</h4>
            <a class="btn btn-primary btn-block" href="/specialists/select"> Choose an appointment</a>

            <h4 class="text-center mt-5"><i class="fas fa-portrait"></i> For specialists</h4>

            @guest
            <div class="btn-group btn-block" role="group" aria-label="Basic example">
                <a class="btn btn-secondary btn-sm" href="/login">Login</a>
                <a class="btn btn-secondary btn-sm" href="/register">Register</a>
            </div>
            @else
                <p> Logged in as  {{ Auth::user()->name }}</p>
            @endguest

            <a class="btn btn-primary btn-block btn-sm" href="/queueboard"> Open queue board (only authenticated users )</a>
            
        </div>
    </div>
</div>
@endsection
