@extends('layouts.auth')

@section('content')
    <div class="text-center mt-4">
        <h1 class="h2">{{ config('app.name', 'Laravel') }},</h1>
        <p class="lead">
            Reset Password
        </p>
    </div>

    <div class="card">

        <div class="card-body">

            <div class="m-sm-4">

                <div class="text-center">
                    <img src="{{ asset( 'img/placeholder.png' ) }}" alt="{{ config('app.name', 'Laravel') }}" class="img-fluid rounded-circle" width="120" height="120" />
                </div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    

@endsection
