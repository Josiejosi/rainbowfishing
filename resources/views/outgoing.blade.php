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
                                                <a type="button" class="btn btn-primary btn-sm" href="{{ url('/send/payment') }}/{{ $order->id }}">
                                                    <i class="fas fa-fish"></i> Confirm Sending
                                                </a>
                                                @elseif ( $order->status == 2 )
                                                	<span class="badge badge-info">Awaiting Approval</span>
                                                @elseif ( $order->status == 3 )

                                                    <span class="badge badge-info">Received</span>

                                                @endif
                                            </td>
                                        </tr>

                                    @endforeach

                                @else

                                    <tr>
                                        <td colspan="3">Nothing yet</td>
                                    </tr>

                                @endif

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
    
@endsection
