@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="md-12 col">
            <h3>{{ __('Login') }}</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
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
                    <input class="input-block @error('password') border border-danger @enderror" type="password" id="password"
                        name="password" required autocomplete="current-password">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>

                <fieldset class="form-group">
                    <label for="remember" class="paper-check">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span>{{ __('Remember Me') }}</span>
                    </label>
                </fieldset>

                <button type="submit" class="btn-primary">{{ __('Login') }}</button>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </form>
        </div>
    </div>
@endsection
