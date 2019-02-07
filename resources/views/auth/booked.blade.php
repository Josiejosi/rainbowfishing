@extends('layouts.auth')

@section('content')


    <div class="text-center mt-4">
        <h1 class="h2">{{ config('app.name', 'Laravel') }},</h1>
        <p class="lead">
            Inactive Account
        </p>
    </div>

    <div class="card">

        <div class="card-body">

            <div class="m-sm-4">

                <div class="text-center">
                    <img src="{{ asset( 'img/placeholder.png' ) }}" alt="{{ config('app.name', 'Laravel') }}" class="img-fluid rounded-circle" width="120" height="120" />
                </div>
                
                <h1>Sorry, but your account is inactive</h1>
                <p class="lead">
                    To activate your account, please contact the admin in the whatsapp group</p>
                </p>
            </div>

        </div>
    </div>


@endsection
