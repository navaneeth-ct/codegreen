@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-0">{{ auth()->user()->username }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Born on {{ date('F j, Y', strtotime(auth()->user()->details->dob)) }}</li>
                            <li class="list-group-item">From {{ auth()->user()->details->city }}</li>
                            <li class="list-group-item"><a href="mailto:{{ auth()->user()->details->email }}">{{ auth()->user()->details->email }}</a></li>
                        </ul>
                        <div class="card-body">
                            <a href="{{ route('edit') }}" class="card-link">Edit</a>

                            <a href="{{ route('destroy') }}" class="card-link" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Delete</a>
                            <form id="delete-form" method="POST" action="{{ route('destroy') }}" style="display: none;">
                                @method('DELETE')
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
