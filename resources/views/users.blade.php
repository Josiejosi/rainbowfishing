@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">Manage users</div>

        <div class="card-body p-4">

        	<div class="table-responsive">
        		<table class="table table-hover">
        			<thead>
        				<tr>
        					<th>Name</th>
        					<th>Email</th>
        					<th><i class="fas fa-cogs"></i> Block/Unblock</th>
        					<th><i class="fas fa-cogs"></i> Activate Account</th>
        				</tr>
        			</thead>
        			<tbody>
        				@if ( $users )
        				@foreach ( $users as $user )
        				<tr>
        					<td>{{ $user->name }}</td>
        					<td>{{ $user->email }}</td>
        					<td>
        						@if ( $user->is_blocked == 0 )
        						<a href="{{ url( '/user/block/' ) }}/{{ $user->id }}" class="btn btn-danger">Block</a>
        						@else
								<a href="{{ url( '/user/unblock/' ) }}/{{ $user->id }}" class="btn btn-success">Unblock</a>
        						@endif
        					</td>
        					<td>
        						@if ( $user->is_blocked == 1 )
        						<span class="label label-success">Active User</span>
        						@else
								<a href="{{ url( '/user/activate/' ) }}/{{ $user->id }}" class="btn btn-success">Activate</a>
        						@endif        						
        					</td>
        				</tr>

        				@endforeach
        				@else
						<tr>
        					<td colspan="3">No new members yet.</td>
        				</tr>
        				@endif
        			</tbody>
        		</table>
        	</div>

        </div>

    </div>
    
@endsection
