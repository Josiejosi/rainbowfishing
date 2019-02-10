@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">Update Phone Number</div>

        <div class="card-body p-4">
            <form method="POST" action="{{ url( '/phone' ) }}">
                @csrf

                <div class="form-group row">
                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                    <div class="col-md-6">
                        <input id="phone_number" 
                        	type="text" 
                        	class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" 
                        	name="phone_number" value="{{ isset( auth()->user()->phone_number ) ? auth()->user()->phone_number : '' }}" 
                        	required autofocus>

                        @if ($errors->has('phone_number'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone_number') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    
@endsection
