@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">Banking Details</div>

        <div class="card-body p-4">
            <form method="POST" action="{{ url( '/account/update' ) }}">
                @csrf

                <div class="form-group row">
                    <label for="bank" class="col-md-4 col-form-label text-md-right">{{ __('Bank') }}</label>

                    <div class="col-md-6">
                        <input id="bank" 
                        	type="text" 
                        	class="form-control{{ $errors->has('bank') ? ' is-invalid' : '' }}" 
                        	name="bank" value="{{ isset( auth()->user()->account->bank ) ? auth()->user()->account->bank : '' }}" 
                        	required autofocus>

                        @if ($errors->has('bank'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('bank') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="account_number" class="col-md-4 col-form-label text-md-right">{{ __('Account Number') }}</label>

                    <div class="col-md-6">
                        <input id="account_number" 
                        		type="text" class="form-control{{ $errors->has('account_number') ? ' is-invalid' : '' }}" 
                        		name="account_number" 
                        		value="{{ isset( auth()->user()->account->account_number ) ? auth()->user()->account->account_number : '' }}" required>

                        @if ($errors->has('account_number'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('account_number') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="account_holder" class="col-md-4 col-form-label text-md-right">{{ __('Account Holder') }}</label>

                    <div class="col-md-6">
                        <input id="account_holder" 
                        		type="text" class="form-control{{ $errors->has('account_holder') ? ' is-invalid' : '' }}" 
                        		name="account_holder" 
                        		value="{{ isset( auth()->user()->account->account_holder ) ?auth()->user()->account->account_holder : '' }}" required>

                        @if ($errors->has('account_holder'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('account_holder') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="branch_number" class="col-md-4 col-form-label text-md-right">{{ __('Branch Name') }}</label>

                    <div class="col-md-6">

                        <input id="branch_number" 
                        		type="text" class="form-control{{ $errors->has('branch_number') ? ' is-invalid' : '' }}" 
                        		name="branch_number" 
                        		value="{{ isset( auth()->user()->account->branch_number ) ? auth()->user()->account->branch_number : '' }}" 
                        		required>

						<small class="text-muted">Optional</small>
                        @if ($errors->has('branch_number'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('branch_number') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="branch_code" class="col-md-4 col-form-label text-md-right">{{ __('Branch Code') }}</label>

                    <div class="col-md-6">

                        <input id="branch_code" 
                        		type="text" 
                        		class="form-control{{ $errors->has('branch_code') ? ' is-invalid' : '' }}" 
                        		name="branch_code" 
                        		value="{{ isset( auth()->user()->account->branch_code ) ? auth()->user()->account->branch_code : '' }}" 
                        		required>

						<small class="text-muted">Optional</small>
                        @if ($errors->has('branch_code'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('branch_code') }}</strong>
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
