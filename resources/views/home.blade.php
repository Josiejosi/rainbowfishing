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
                            <h2><i class="text-primary fas fa-plus"></i> R 0.00</h2>
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
                            <h2><i class="text-primary fas fa-minus"></i> R 0.00</h2>
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
                            <h2> R 0.00</h2>
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

            @if ( !$list_hour["is_list_hour"] )

                <div class="alert alert-warning p-4" role="alert">
                    <h3>List available between {{ $list_hour["tomorrow_twelve"] }} & {{ $list_hour["tomorrow_one"] }}</h3>
                </div>                    

            @else

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
                            <tr>
                                <td>001</td>
                                <td>Capitec</td>
                                <td>R 600</td>
                                <td>
                                    <button type="button" class="btn btn-primary fish-me"><i class="fas fa-fish"></i> Catch</button>
                                </td>
                            </tr>
                            <tr>
                                <td>002</td>
                                <td>FNB</td>
                                <td>R 600</td>
                                <td>
                                    <button type="button" class="btn btn-primary fish-me"><i class="fas fa-fish"></i> Catch</button>
                                </td>
                            </tr>
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

                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">Incoming Transactions</div>

                <div class="card-body p-4">

                </div>
            </div>
        </div>
    </div>

@endsection
