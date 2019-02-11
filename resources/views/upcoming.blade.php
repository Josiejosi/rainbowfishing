@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header">Upcoming Transactions</div>

                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <th>Bank</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </thead>
                            <tbody>

                                @if ( count( $orders ) )

                                    @foreach( $orders as $order )

                                        <tr>
                                            <td>
                                                @if ( isset( $order->user->account->bank ) ) 
                                                {{$order->user->account->bank  }}
                                                @else
                                                <a href="{{ url( '/account' ) }}" class='btn btn-success'>Add Account</a>
                                                @endif
                                            </td>
                                            <td>R {{ $order->amount }}</td>
                                            <td>{{ $order->matures_at->diffForHumans() }}</td>
                                        </tr>

                                    @endforeach

                                @else

                                    <tr>
                                        <td colspan="2">Nothing yet</td>
                                    </tr>

                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    
@endsection
