<?php 

    $unread_notifications = \App\Classes\Notifications::getUnRead( auth()->user()->id ) ;

?>

<li class="nav-item dropdown ml-lg-2">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
        @if (  count( $unread_notifications ) > 0 )
        <span class="d-none d-lg-inline-block"><span class="badge badge-warning">{{ count( $unread_notifications ) }}</span>  Notifications</span>
        @else
        <span class="d-none d-lg-inline-block">Notifications</span>
        @endif
        <span class="d-lg-none"><i class="align-middle fas fa-fw fa-bell"></i></span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
        <div class="dropdown-menu-header">
            {{ count( $unread_notifications ) }} New Notifications
        </div>
        <div class="list-group">



            @if (  count( $unread_notifications ) > 0 )

                @foreach(  $unread_notifications as $notification  )

                    <a href="{{ url( '/notification/markasread/' ) }}/{{ $notification->id }}" class="list-group-item">
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

            @endif

        </div>
        <div class="dropdown-menu-footer">
            <a href="{{ url( '/notifications' ) }}" class="text-muted">Show all notifications</a>
        </div>
    </div>
</li>