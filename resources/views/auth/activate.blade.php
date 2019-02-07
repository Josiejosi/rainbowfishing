@extends('layouts.auth')

@section('content')


    <div class="text-center mt-4">
        <h1 class="h2">Welcome to {{ config('app.name', 'Laravel') }},</h1>
        <p class="lead">
            Please complete this form to activate your account.
        </p>
    </div>

    <div class="card">

        <div class="card-body">

            <div class="m-sm-4">

                <div class="text-center">
                    <img src="{{ asset( 'img/placeholder.png' ) }}" alt="{{ config('app.name', 'Laravel') }}" class="img-fluid rounded-circle" width="120" height="120" />
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="pop" class="col-md-4 col-form-label text-md-right">{{ __('Proof of payment') }}</label>

                        <div class="col-md-6">
                            <input id="pop" type="pop" class="form-control{{ $errors->has('pop') ? ' is-invalid' : '' }}" name="pop" value="{{ old('pop') }}" required autofocus>

                            @if ($errors->has('pop'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pop') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Acivate') }}
                            </button>

                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>


@endsection
