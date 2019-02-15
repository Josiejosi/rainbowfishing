@extends('layouts.app')

@section('content')


    <div class="card">
        <div class="card-header"><i class="fas fa-dice"></i> Next Fishing list</div>

        <div class="card-body p-4">
                
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Ord#</th>
                            <th>Bank</th>
                            <th>Amt</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        @if ( count( $orders ) )

                            @foreach( $orders as $order )

                                <tr>
                                    <td>RF00{{ $order->id }}</td>
                                    <td>{{ isset( $order->user->account->bank ) ? $order->user->account->bank : 'Not set' }}</td>
                                    <td>R {{ $order->amount }}</td>
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

        </div>
    </div>

@endsection

