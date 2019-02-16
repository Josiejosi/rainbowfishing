@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">Incoming Transactions</div>

        <div class="card-body p-4">

            @include( "partials.incoming" )
            
        </div>

    </div>
    
@endsection
