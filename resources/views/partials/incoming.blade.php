<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <th>Bank</th>
            <th>Amount</th>
            <th><i class="fas fa-cogs"></i></th>
        </thead>
        <tbody>

            @if ( count( $incoming ) )

                @foreach( $incoming as $order )

                    <tr>
                        <td>{{ $order->user->account->bank }}</td>
                        <td>R {{ $order->amount }}</td>
                        <td>

                            <?php $user = \App\User::find( $order->sender_id ) ; ?>

                            <table class="table"><tbody>
                                <tr>
                                    @if ( $order->status == 1 )

                                        <td><span class="badge badge-info">Reserved</span></td>

                                    @elseif ( $order->status == 2 )

                                        <td>

                                            <a class="btn btn-success" 
                                                href="{{ url('/received/payment') }}/{{ $order->id }}">
                                                Confirm Received
                                            </a>

                                        </td>

                                    @elseif ( $order->status == 3 )

                                        <td><span class="badge badge-info">Paid</span></td>

                                    @endif

                                    <td>
                                        
                                        <a href="{{ url( '/sender/details/' ) }}/{{ $user->id }}/ {{ $order->amount }}" 
                                            class="btn btn-info btn-block btn-sm">
                                            Sender Details
                                        </a>

                                    </td>
                                </tr>
                            </tbody></table>

                        </td>
                    </tr>

                @endforeach

            @endif

            @if ( count( $incoming_split ) )

                @foreach( $incoming_split as $order )
                    <?php 
                        $receiver = \App\User::find($order->receiver_id) ;
                        $sender = \App\User::find( $order->sender_id ) ; 
                    ?>

                    <tr>
                        <td>{{ $receiver->account->bank }}</td>
                        <td>R {{ $order->amount }}</td>
                        <td>

                            

                            <table class="table"><tbody>
                                <tr>
                                    @if ( $order->status == 1 )

                                        <td><span class="badge badge-info">Reserved</span></td>

                                    @elseif ( $order->status == 2 )

                                        <td>

                                            <a class="btn btn-success" 
                                                href="{{ url('/split/received/payment') }}/{{ $order->id }}">
                                                Confirm Received
                                            </a>

                                        </td>

                                    @elseif ( $order->status == 3 )

                                        <td><span class="badge badge-info">Paid</span></td>

                                    @endif

                                    <td>
                                        
                                        <a href="{{ url( '/sender/details/' ) }}/{{ $sender->id }}/{{ $order->amount }}" 
                                            class="btn btn-info btn-block btn-sm">
                                            Sender Details
                                        </a>

                                    </td>
                                </tr>
                            </tbody></table>

                        </td>
                    </tr>


                @endforeach

            @endif

        </tbody>
    </table>
</div>