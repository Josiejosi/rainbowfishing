@extends('layouts.app')

@section('content')


    <div class="card">
        <div class="card-header"><i class="fas fa-dice"></i> Fish</div>

        <div class="card-body p-4">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if ( count( $outgoing ) )

                @foreach( $outgoing as $order )

                    @if ( $order->status == 1 )

                    <div class="alert alert-danger p-4 text-center" id="block{{ $order->id }}" role="alert">
                        <h3>{{ $order->block_at }} Remaining to make a payment to order: RF00 {{ $order->id }} </a></h3>
                    </div>

                    @endif

                @endforeach

            @endif

            @if ( $list_hour["early_list"] ||  $list_hour["late_list"] )
                
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Ord#</th>
                                <th>Bank</th>
                                <th>Amt</th>
                                <th class="text-center"><i class="fas fa-dice"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @if ( count( $orders ) )

                                @foreach( $orders as $order )

                                    <tr>
                                        <td>RF00{{ $order->id }}</td>
                                        <td>{{ isset( $order->user->account->bank ) ? $order->user->account->bank : 'Not set' }}</td>
                                        <td>R {{ $order->amount }}</td>
                                        <td>
                                            @if ( $linked_account )
                                                <a class="btn btn-primary fish-me" href="{{ url('/member/details/') }}/{{ $order->id }}">
                                                    <i class="fas fa-fish"></i> Catch
                                                </a>
                                            @else
                                                <span class="badge badge-info">Link Account</span>
                                            @endif
                                        </td>
                                    </tr>

                                @endforeach

                            @else

                                <tr>
                                    <td colspan="4">Nothing on the list at the moment.</td>
                                </tr>

                            @endif

                        </tbody>
                    </table>
                </div>

            @else


                <div class="alert alert-warning p-4 text-center" role="alert">
                    <h3>First List 12:00 PM, Second List 20:00 PM</h3>
                </div> 

            @endif

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

</script>

@endsection

