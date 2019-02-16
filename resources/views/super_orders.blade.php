@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">Add super admin to list</div>

        <div class="card-body p-4">

            <form method="POST" action="{{ url( '/super/order' ) }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Admin') }}</label>

                    <div class="col-md-6">
                        <select id="admin_id" class="form-control{{ $errors->has('admin_id') ? ' is-invalid' : '' }}" name="admin_id" value="{{ old('admin_id') }}">
							@foreach( $users as $user )
							<option value="{{ $user->id }}">{{ $user->name }}</option>
							@endforeach

						</select>
                        @if ($errors->has('admin_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('admin_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>

                    <div class="col-md-6">
                        <input type="text" id="amount" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" value="{{ old('amount') }}">

						<small class="text-muted">
							Amount be R 50.00 - R 2000.00
						</small>
                        @if ($errors->has('amount'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('amount') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Add to list') }}
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>
    
@endsection
