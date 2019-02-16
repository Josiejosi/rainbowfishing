@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Outgoing Transactions</div>

        <div class="card-body p-4">

            @include( "partials.outgoing" )

        </div>
    </div>
    
@endsection
