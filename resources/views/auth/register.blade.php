@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="md-12 col">
            <h3>{{ __('Register') }}</h3>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input class="input-block @error('name') border border-danger @enderror" type="text" id="name"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input class="input-block @error('email') border border-danger @enderror" type="email" id="email"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input class="input-block @error('password') border border-danger @enderror" type="password"
                        id="password" name="password" value="{{ old('password') }}" required autocomplete="password"
                        autofocus>

                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input class="input-block" type="password" id="password-confirm" name="password_confirmation"
                        value="{{ old('password') }}" required autocomplete="new-password" autofocus>
                </div>

                <button type="submit" class="btn-primary">
                    {{ __('Register') }}
                </button>
            </form>
        </div>
    </div>
@endsection
