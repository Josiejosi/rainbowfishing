@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Outgoing Transactions</div>

        <div class="card-body p-4">

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <th>ORD#</th>
                        <th>Receiver</th>
                        <th>Sender</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th><i class="fas fa-cogs"></i></th>
                    </thead>
                    <tbody>

                        @if ( count( $outgoing ) )

                            @foreach( $outgoing as $order )

                                <?php 

                                    $sender = \App\User::find( $order->sender_id ) ;

                                ?>

                                <tr>
                                    <td>RF00{{ $order->id }}</td>
                                    <td>{{ isset( $order->user->name ) ? $order->user->name : '' }}</td>
                                    <td>{{ isset( $sender->name ) ? $sender->name : '' }}</td>
                                    <td>R {{ $order->amount }}</td>
                                    <td>
                                        
                                        @if ( $order->status == 1 )
                                            <span class="badge badge-info">Reserved</span>
                                        @elseif ( $order->status == 2 )
                                            <span class="badge badge-info">Awaiting Approval</span>
                                        @elseif ( $order->status == 3 )
                                            <span class="badge badge-info">Received</span>
                                        @endif
                                        <a  class="btn btn-success btn-sm" href="{{ url('/send/payment') }}/{{ $order->id }}">
                                            Confirm Sending
                                        </a>
                                        <a  class="btn btn-success btn-sm" href="{{ url('/received/payment') }}/{{ $order->id }}">
                                            Confirm Received
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="{{ url('/drop/order') }}/{{ $order->id }}">
                                            Drop Order
                                        </a>
                                    </td>
                                </tr>

                            @endforeach

                        @endif

                        @if ( count( $outgoing_split ) )

                            @foreach( $outgoing_split as $order )

                                <?php 

                                    $sender = \App\User::find( $order->sender_id ) ;
                                    $receiver = \App\User::find( $order->receiver_id ) ;

                                ?>

                                <tr>
                                    <td>RF00{{ $order->id }}</td>
                                    <td>{{ isset( $receiver->name ) ? $receiver->name : '' }}</td>
                                    <td>{{ isset( $sender->name ) ? $sender->name : '' }}</td>
                                    <td>R {{ $order->amount }}</td>
                                    <td>
                                        
                                        @if ( $order->status == 1 )
                                            <span class="badge badge-info">Reserved</span>
                                        @elseif ( $order->status == 2 )
                                            <span class="badge badge-info">Awaiting Approval</span>
                                        @elseif ( $order->status == 3 )
                                            <span class="badge badge-info">Received</span>
                                        @endif
                                        <a  class="btn btn-success btn-sm" href="{{ url('/send/payment') }}/{{ $order->id }}">
                                            Confirm Sending
                                        </a>
                                        <a  class="btn btn-success btn-sm" href="{{ url('/received/payment') }}/{{ $order->id }}">
                                            Confirm Received
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="{{ url('/drop/order') }}/{{ $order->id }}">
                                            Drop Order
                                        </a>
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
