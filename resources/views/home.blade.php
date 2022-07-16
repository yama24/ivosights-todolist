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
        <div class="md-12 col">
            <div style="border-color: #41403e;" class="card border border-6 border-primary margin-bottom">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 align-middle">
                            <fieldset class="form-group margin-bottom-none">
                                <label for="paperChecks1" class="paper-check" style="margin-bottom: 0;">
                                    <input type="checkbox" name="paperChecks" id="paperChecks1" value="option 1">
                                    <span>
                                        <h4 style="display: inline;">Lorem, ipsum.</h4>
                                        <p style="margin-bottom: 0;">Lorem ipsum dolor sit amet.</p>
                                    </span>
                                </label>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            <div style="border-color: #41403e;" class="card border border-6 border-primary margin-bottom">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 align-middle">
                            <fieldset class="form-group margin-bottom-none">
                                <label for="paperChecks1" class="paper-check" style="margin-bottom: 0;">
                                    <input type="checkbox" name="paperChecks" id="paperChecks1" value="option 1">
                                    <span>
                                        <h4 style="display: inline;">Lorem, ipsum.</h4>
                                        <p style="margin-bottom: 0;">Lorem ipsum dolor sit amet.</p>
                                    </span>
                                </label>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
