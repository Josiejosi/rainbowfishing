@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-6 col-xl-4 d-flex">
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
        <div class="col-6 col-xl-4 d-flex">
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
        <div class="col-6 col-xl-4 d-flex">
            <div class="card flex-fill">
                <div class="card-body py-3">
                    <div class="row">
                        <div class="col-12 col-sm-4 align-self-center text-center text-sm-left">
                            <div class="icon icon-warning">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <div class="col-12 col-sm-8 align-self-center text-center text-sm-right">
                            <p class="text-muted mb-1">Pending Funds</p>
                            <h2> R {{ $pending_amount }}</h2>
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

            @if ( !$linked_account )
                <div class="alert alert-warning p-4" role="alert">
                    <h3>You need to link your bank account to start <a href="{{ url( '/account' ) }}" class="btn btn-success">Add Account</a></h3>
                </div> 
            @endif

            @if ( ! $list_hour["early_list"] )

                <div class="alert alert-warning p-4" role="alert">
                    <h3>First List between {{ $list_hour["early_list_start"] }} & {{ $list_hour["early_list_ends"] }}</h3>
                </div> 

            @endif

            @if ( ! $list_hour["late_list"] )

                <div class="alert alert-warning p-4 text-center" role="alert">
                    <h3>Second List between {{ $list_hour["late_list_start"] }} & {{ $list_hour["late_list_end"] }}</h3>
                </div> 

            @endif

            @if ( $list_hour["early_list"] ||  $list_hour["late_list"] )
                
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Bank</th>
                                <th>Amount</th>
                                <th><i class="fas fa-dice"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @if ( count( $orders ) )

                                @foreach( $orders as $order )

                                    <tr>
                                        <td>RF00{{ $order->id }}</td>
                                        <td>{{ $order->user->account->bank }}</td>
                                        <td>R {{ $order->amount }}</td>
                                        <td>
                                            <a type="button" class="btn btn-primary fish-me" href="{{ url('/member/details/') }}/{{ $order->id }}">
                                                <i class="fas fa-fish"></i> Catch
                                            </a>
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

            @endif

        </div>
    </div>

    <div class="row">
        <div class="col-6">
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

                                                    <span class="badge badge-indo">Received</span>

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
        </div>
        <div class="col-6">
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
                                                <a type="button" class="btn btn-primary btn-sm" href="{{ url('/received/payment') }}/{{ $order->id }}">
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
        </div>
    </div>

@endsection
