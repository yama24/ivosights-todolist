@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="md-12 col">
            <h3>{{ __('Dashboard') }}</h3>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <p>{{ __('You are logged in!') }}</p>
        </div>
    </div>
@endsection
