@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-6 col-xl-6 d-flex">
            <div class="card flex-fill">
                <div class="card-body py-3">
                    <div class="row">
                        <div class="col-12 col-sm-4 align-self-center text-center text-sm-left">
                            <div class="icon icon-primary">
                               <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <div class="col-12 col-sm-8 align-self-center text-center text-sm-right">
                            <p class="text-muted mb-1">Received Funds</p>
                            <h2><i class="text-primary fas fa-plus"></i> R {{ $incoming_amount }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-xl-6 d-flex">
            <div class="card flex-fill">
                <div class="card-body py-3">
                    <div class="row">
                        <div class="col-12 col-sm-4 align-self-center text-center text-sm-left">
                            <div class="icon icon-success">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <div class="col-12 col-sm-8 align-self-center text-center text-sm-right">
                            <p class="text-muted mb-1">Send Funds</p>
                            <h2><i class="text-primary fas fa-minus"></i> R {{ $outgoing_amount }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body p-4">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if ( auth()->user()->account == null )
                <div class="alert alert-warning p-4 text-center" role="alert">
                    Link your banking account:
                   <a class="btn btn-primary btn-lg" href="{{ url('/account') }}">Link Account</a> 

                </div>
            @endif
            <div class="alert alert-info p-4 text-center" id="first_slot" role="alert"></div>
            <div class="alert alert-info p-4 text-center" id="second_slot" role="alert"></div>

            @if ( count( $outgoing ) )

                @foreach( $outgoing as $order )

                    @if ( $order->status == 1 )

                    <div class="alert alert-danger p-4 text-center" id="block{{ $order->id }}" role="alert">
                        <h3>{{ $order->block_at }} Remaining to make a payment to order: RF00 {{ $order->id }} </a></h3>
                    </div>

                    @endif

                @endforeach

            @endif

        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">Outgoing Transactions</div>

                <div class="card-body p-4">

                    @include( "partials.outgoing" )

                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">Incoming Transactions</div>

                <div class="card-body p-4">

                    @include( "partials.incoming" )

                </div>

            </div>
        </div>
    </div>

@endsection

@section('js')

<script src="{{ asset( 'js/jquery.countdown.js' ) }}"></script>

<script>
 
    @if ( count( $outgoing ) )

        @foreach( $outgoing as $order )

            @if ( $order->status == 1 )


                $( '#block{{ $order->id }}' ).countdown( '{{ $order->block_at }}' ).on('update.countdown', function(event) {

                    var format = '%H:%M:%S';

                    if(event.offset.totalDays > 0) {
                        format = '%-d day%!d ' + format;
                    }
                    if(event.offset.weeks > 0) {
                        format = '%-w week%!w ' + format;
                    }
                    var amount = {{ $order->amount }} ;

                    $( this ).html( event.strftime( format + ' Remaining to make a payment of ' + amount ) );

                }).on('finish.countdown', function(event) {
                    $(this).html('This offer has expired!').parent().addClass('disabled');
                }) ;

            @endif

        @endforeach

    @endif 

    $( '#first_slot' ).countdown( '{{ $list_hour["today_twelve"] }}' ).on('update.countdown', function(event) {

        var format = '%H:%M:%S';

        if(event.offset.totalDays > 0) {
            format = '%-d day%!d ' + format;
        }
        if(event.offset.weeks > 0) {
            format = '%-w week%!w ' + format;
        }

        $( this ).html( event.strftime( '<h4 class="text-center">' + format + ' Remaining to fish on the early slot</h4>' ) );

    }).on('finish.countdown', function(event) {
        $(this).html('<a class="btn btn-primary btn-block btn-lg" href="{{ url('/fish') }}"><i class="fas fa-fish"></i> Start Fishing</a>') ;
    }) ; 

    $( '#second_slot' ).countdown( '{{ $list_hour["today_eight"] }}' ).on('update.countdown', function(event) {

        var format = '%H:%M:%S';

        if(event.offset.totalDays > 0) {
            format = '%-d day%!d ' + format;
        }
        if(event.offset.weeks > 0) {
            format = '%-w week%!w ' + format;
        }

        $( this ).html( event.strftime( '<h4 class="text-center">' + format + ' Remaining to fish on the night slot</h4>' ) );

    }).on('finish.countdown', function(event) {
        $(this).html('<a class="btn btn-primary btn-block btn-lg" href="{{ url('/fish') }}"><i class="fas fa-fish"></i> Start Fishing</a>') ;
    }) ;  

</script>

@endsection

