@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">My notifications</div>

        <div class="card-body p-4">

        	@if (  count( $notifications ) > 0 )

                @foreach(  $notifications as $notification  )

                    <a href="{{ url( '/notification/read/' ) }}/{{ $notification->id }}" class="list-group-item">
                        <div class="row no-gutters align-items-center">
                            <div class="col-2">
                                <i class="ml-1 text-danger fas fa-fw fa-bell"></i>
                            </div>
                            <div class="col-10">
                                <div class="text-muted small mt-1">{{ $notification->message }}</div>
                                <div class="text-muted small mt-1">{{ $notification->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                    </a>

                @endforeach

            @else

            
                
            @endif

        </div>

    </div>
    
@endsection
