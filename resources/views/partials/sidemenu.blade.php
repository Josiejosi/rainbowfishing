                    <nav id="sidebar" class="collapse collapse-disabled-md sidebar sidebar-sticky">

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Main</h5>
                            </div>
                            <div class="sidebar-content">

                                <a href="{{ url( '/home' ) }}" class="sidebar-item">
                                    <i class="align-middle mr-1 fas fa-fw fa-home"></i> 
                                    <span class="align-middle">Dashboard</span>
                                </a>
                                <a href="{{ url( '/account' ) }}" class="sidebar-item">
                                    <i class="align-middle mr-1 fas fa-fw fa-sliders-h"></i>
                                    <span class="align-middle">Account</span>
                                </a>
                                <a href="{{ url( '/password' ) }}" class="sidebar-item">
                                    <i class="align-middle mr-1 fas fa-fw fa-money-check-alt"></i>
                                    <span class="align-middle">Password</span>
                                </a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Transctions</h5>
                            </div>
                            <div class="sidebar-content">

                                <a href="{{ url( '/incoming' ) }}" class="sidebar-item">
                                    <i class="fas fa-angle-double-down"></i>
                                    <span class="align-middle">Incoming</span>
                                </a>
                                <a href="{{ url( '/outgoing' ) }}" class="sidebar-item">
                                    <i class="fas fa-angle-double-up"></i>
                                    <span class="align-middle">Outgoing</span>
                                </a>
                            </div>
                        </div>

                        @if ( auth()->user()->role == 2 )

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Admin</h5>
                            </div>
                            <div class="sidebar-content">

                                <a href="{{ url( '/admins' ) }}" class="sidebar-item">
                                    <i class="fas fa-user"></i>
                                    <span class="align-middle">New Admin user</span>
                                </a>
                                <a href="{{ url( '/orders' ) }}" class="sidebar-item">
                                    <i class="fas fa-money-check-alt"></i>
                                    <span class="align-middle">Admin Order</span>
                                </a>
                                <a href="{{ url( '/users' ) }}" class="sidebar-item">
                                    <i class="fas fa-user"></i>
                                    <span class="align-middle">Manage Users</span>
                                </a>
                            </div>
                        </div>

                        @endif

                    </nav>