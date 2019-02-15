@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">Payment Details</div>

        <div class="card-body p-4">

        	<div class="row">
        		<div class="col-md-6 offset-md-3">
                    @if ( $order->status == 0 )
        			<div class="table-responsive">
        				<table class="table table-hover">
        					<thead>
        						<th colspan="2">Member Banking Details</th>
        					</thead>
        					<tbody>

                                <tr>
                                    <td>User's Name:</td>
                                    <td>{{ isset( $order->user->name ) ? $order->user->name : 'Not set' }}</td>
                                </tr>

                                <tr>
                                    <td>Phone Number:</td>
                                    <td>{{ isset( $order->user->phone_number ) ? $order->user->phone_number : 'Not set' }}</td>
                                </tr>
        						<tr>
        							<td>Bank:</td>
        							<td>{{ isset( $order->user->account->bank ) ? $order->user->account->bank : 'Not set' }}</td>
        						</tr>
        						<tr>
        							<td>Account Number:</td>
        							<td>{{ isset( $order->user->account->account_number ) ? $order->user->account->account_number : '' }}</td>
        						</tr>
        						<tr>
        							<td>Branch Name:</td>
        							<td>{{ isset( $order->user->account->branch_number ) ? $order->user->account->branch_number : '' }}</td>
        						</tr>
        						<tr>
        							<td>Branch Code:</td>
        							<td>{{ isset( $order->user->account->branch_code  ) ? $order->user->account->branch_code : '' }}</td>
        						</tr>
                                <tr>
                                    <td>Min: R 50.00</td>
                                    <td>Max: R 2000.00</td>
                                </tr>
        						<tr>
        							<td>Amount:</td>
        							<td>R {{ $order->amount }}</td>
        						</tr>
        					</tbody>
        					<tfoot>
        						<th colspan="2" class="text-center">
        							<form method="POST" action="{{ url( '/member/details' ) }}">
                						@csrf
                                        <div class="form-group row">
                                            <input type="text" name="amount" id="amount" class="form-control" value="{{ $order->amount }}">
                                        </div>
                						<input type="hidden" name="order_id" value="{{ $order->id }}">
                						<input type="hidden" name="user_id" value="{{ $order->user_id }}">
										<button type="submit" class="btn btn-success">Reserve</button>
									</form>
        						</th>
        					</tfoot>
        				</table>
        			</div>
                    @else
                    <div class="alert alert-success p-5">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Order already reserved.
                        <br>
                        
                    </div>
                    <a href="{{ url('/home') }}" class="btn btn-warning">Try other order</a>
                    @endif
        		</div>
        	</div>

        </div>

    </div>
    
@endsection
