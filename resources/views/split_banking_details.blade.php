@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">Payment Details</div>

        <div class="card-body p-4">

        	<div class="row">
        		<div class="col-md-6 offset-md-3">
        			<div class="table-responsive">
        				<table class="table table-hover">
        					<thead>
        						<th colspan="2">Member Banking Details</th>
        					</thead>
        					<tbody>

                                <?php 
                                    $user = \App\User::find($order->receiver_id) ;
                                ?>

                                <tr>
                                    <td>User's Name:</td>
                                    <td>{{ isset( $user->name ) ? $user->name : 'Not set' }}</td>
                                </tr>

                                <tr>
                                    <td>Phone Number:</td>
                                    <td>{{ isset( $user->phone_number ) ? $user->phone_number : 'Not set' }}</td>
                                </tr>
        						<tr>
        							<td>Bank:</td>
        							<td>{{ isset( $user->account->bank ) ? $user->account->bank : 'Not set' }}</td>
        						</tr>
        						<tr>
        							<td>Account Number:</td>
        							<td>{{ isset( $user->account->account_number ) ? $user->account->account_number : '' }}</td>
        						</tr>
        						<tr>
        							<td>Branch Name:</td>
        							<td>{{ isset( $user->account->branch_number ) ? $user->account->branch_number : '' }}</td>
        						</tr>
        						<tr>
        							<td>Branch Code:</td>
        							<td>{{ isset( $user->account->branch_code  ) ? $user->account->branch_code : '' }}</td>
        						</tr>
        						<tr>
        							<td>Amount:</td>
        							<td>R {{ $order->amount }}</td>
        						</tr>
        					</tbody>
        				</table>
        			</div>
        		</div>
        	</div>

        </div>

    </div>
    
@endsection
