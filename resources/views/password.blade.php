@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">Update Password</div>

        <div class="card-body p-4">

            <form method="POST" action="{{ url( '/password/update' ) }}">
                @csrf

                <div class="form-group row">
                    <label for="password" class="col-md-12 col-form-label text-md-center">{{ auth()->user()->email }}</label>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-danger">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>
    
@endsection