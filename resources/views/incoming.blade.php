@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header">Incoming Transactions</div>

                <div class="card-body p-4">
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
                                                @if ( $order->status == 1 )

                                                    <span class="badge badge-info">Reserved</span>

                                                @elseif ( $order->status == 2 )
                                                <a type="button" class="btn btn-success" href="{{ url('/received/payment') }}/{{ $order->id }}">
                                                    Confirm Received
                                                </a>
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
