       
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                                <a class="nav-link" href="{{url('/')}}">
                                 <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                                </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Department
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    @if (isset(auth()->user()->role->permission['name']['department']['can-add']))
                                     <a class="nav-link" href="{{route('departments.create')}}">Create</a>
                                     @endif

                                     @if (isset(auth()->user()->role->permission['name']['department']['can-view']))
                                    <a class="nav-link" href="{{route('departments.index')}}">View</a>
                                    @endif
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-book-open"></i>
                                </div>
                                User
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                    </div
                            ></a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"
                                        >Role
                                        <div class="sb-sidenav-collapse-arrow">
                                            <i class="fas fa-angle-down"></i>
                                        </div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            @if (isset(auth()->user()->role->permission['name']['role']['can-add']))
                                            <a class="nav-link" href="{{route('roles.create')}}">Create Role</a>
                                            @endif

                                            @if (isset(auth()->user()->role->permission['name']['role']['can-view']))
                                            <a class="nav-link" href="{{route('roles.index')}}">View Role</a>
                                            @endif
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError"
                                        >Users
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">                                       
                                            @if (isset(auth()->user()->role->permission['name']['user']['can-add']))
                                            <a class="nav-link" href="{{route('users.create')}}">Create User</a>
                                            @endif

                                            @if (isset(auth()->user()->role->permission['name']['user']['can-view']))
                                            <a class="nav-link" href="{{route('users.index')}}">View User</a>
                                            @endif
                                                            
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapsePermission" aria-expanded="false" aria-controls="pagesCollapsePermission"
                                    >Permission
                                    <div class="sb-sidenav-collapse-arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </div>
                                </a>
                                <div class="collapse" id="pagesCollapsePermission" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        @if (isset(auth()->user()->role->permission['name']['permission']['can-add']))
                                        <a class="nav-link" href="{{route('permissions.create')}}">Create Permission</a>
                                        @endif 

                                        @if (isset(auth()->user()->role->permission['name']['permission']['can-view']))
                                        <a class="nav-link" href="{{route('permissions.index')}}">View Permission</a>
                                        @endif 
                                    </nav>
                                </div>
                              
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsLeave" aria-expanded="false" aria-controls="collapseLayoutsLeave">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Staff Leave
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayoutsLeave" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">           
                                     <a class="nav-link" href="{{route('leaves.create')}}">Create</a>
 
                                     @if (isset(auth()->user()->role->permission['name']['leave']['can-view']))
                                    <a class="nav-link" href="{{route('leaves.index')}}">Approve</a>
                                    @endif
                                </nav>
                            </div>                        
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsNotice" aria-expanded="false" aria-controls="collapseLayoutsNotice">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Notice
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayoutsNotice" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">  
                                    @if (isset(auth()->user()->role->permission['name']['notice']['can-add']))         
                                     <a class="nav-link" href="{{route('notices.create')}}">Create New</a>
                                     @endif

                                     @if (isset(auth()->user()->role->permission['name']['notice']['can-view']))
                                    <a class="nav-link" href="{{route('notices.index')}}">View </a>
                                    @endif
                                </nav>
                            </div> 
                            @if (isset(auth()->user()->role->permission['name']['mail']['can-add']))   
                            <a class="nav-link" href="{{url('/mail')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                               Mail
                               </a>  
                               @endif                  
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>