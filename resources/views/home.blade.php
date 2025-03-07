@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

    <ul>
        <li><a href="{{ route('a-i-employees.index') }}">AI Employees</a></li>
        <li><a href="{{ route('a-i-tasks.index') }}">AI Tasks</a></li>
    </ul>
    

</div>
@endsection
