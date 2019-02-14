@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header">Outgoing Transactions</div>

                <div class="card-body p-4">

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <th>Bank</th>
                                <th>Amount</th>
                                <th><i class="fas fa-cogs"></i></th>
                            </thead>
                            <tbody>

                                @if ( count( $outgoing ) )

                                    @foreach( $outgoing as $order )

                                        <tr>
                                            <td>{{ $order->user->account->bank }}</td>
                                            <td>R {{ $order->amount }}</td>
                                            <td>
                                                @if ( $order->status == 1 )
                                                <a href="{{ url( '/banking/details/' ) }}/{{ $order->id }}" class="btn btn-info btn-sm">Member Details</a>
                                                <a  class="btn btn-success btn-sm" href="{{ url('/send/payment') }}/{{ $order->id }}">
                                                    Confirm Sending
                                                </a>
                                                <a class="btn btn-danger btn-sm" href="{{ url('/drop/order') }}/{{ $order->id }}">
                                                    Drop Order
                                                </a>
                                                @elseif ( $order->status == 2 )
                                                    <span class="badge badge-info">Awaiting Approval</span>
                                                @elseif ( $order->status == 3 )

                                                    <span class="badge badge-info">Received</span>

                                                @endif
                                            </td>
                                        </tr>

                                    @endforeach

                                @endif

                                @if ( count( $outgoing_split ) )

                                    @foreach( $outgoing_split as $order )

                                        <?php 
                                            $user = \App\User::find($order->receiver_id) ;
                                        ?>

                                        <tr>
                                            <td>{{ $user->account->bank }}</td>
                                            <td>R {{ $order->amount }}</td>
                                            <td>
                                                @if ( $order->status == 1 )
                                                <a href="{{ url( '/banking/details/' ) }}/{{ $order->id }}" class="btn btn-info btn-sm">Member Details</a>
                                                <a  class="btn btn-success btn-sm" href="{{ url('/split/send/payment') }}/{{ $order->id }}">
                                                    Confirm Sending
                                                </a>
                                                <a class="btn btn-danger btn-sm" href="{{ url('/split/drop/order') }}/{{ $order->id }}">
                                                    Drop Order
                                                </a>
                                                @elseif ( $order->status == 2 )
                                                    <span class="badge badge-info">Awaiting Approval</span>
                                                @elseif ( $order->status == 3 )

                                                    <span class="badge badge-info">Received</span>

                                                @endif
                                            </td>
                                        </tr>

                                    @endforeach

                                @endif

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
    
@endsection
