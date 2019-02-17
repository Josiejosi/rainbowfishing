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

                            <table class="table"><tbody>
                                <tr>
                                    @if ( $order->status == 1 )

                                        <td>

                                            <a  class="btn btn-success btn-sm" 
                                                href="{{ url('/send/payment') }}/{{ $order->id }}">
                                                Confirm Sending
                                            </a> 

                                        </td>

                                    @elseif ( $order->status == 2 )

                                        <td><span class="badge badge-info">Awaiting Approval</span></td>

                                    @elseif ( $order->status == 3 )

                                        <td><span class="badge badge-info">Paid</span></td>

                                    @endif

                                    <td>
                                        
                                        <a href="{{ url( '/banking/details/' ) }}/{{ $order->id }}" 
                                            class="btn btn-info btn-block btn-sm">
                                            Receiver Details
                                        </a>

                                    </td>
                                </tr>
                            </tbody></table>

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
                            
                            <table class="table"><tbody>
                                <tr>
                                    @if ( $order->status == 1 )

                                        <td>

                                            <a  class="btn btn-success btn-sm" 
                                                href="{{ url('/split/send/payment') }}/{{ $order->id }}">
                                                Confirm Sending
                                            </a> 

                                        </td>

                                    @elseif ( $order->status == 2 )

                                        <td><span class="badge badge-info">Awaiting Approval</span></td>

                                    @elseif ( $order->status == 3 )

                                        <td><span class="badge badge-info">Paid</span></td>

                                    @endif

                                    <td>
                                        
                                        <a href="{{ url( '/split/banking/details/' ) }}/{{ $order->id }}" 
                                            class="btn btn-info btn-block btn-sm">
                                            Receiver Details
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