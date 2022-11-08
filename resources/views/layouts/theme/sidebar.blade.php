<div class="sidebar-wrapper sidebar-theme">
    <div id="compact_submenuSidebar" class="submenu-sidebar"></div>
    <nav id="compactSidebar">
        <ul class="menu-categories">

            @role('Admin')
            <li class="active">
                <a href="{{url('categories')}}" class="menu-toggle" data-active="true">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="
                             feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="
                             7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width=
                             "7" height="7"></rect></svg>
                        </div>
                        <span>CATEGORIAS</span>
                    </div>
                </a>
            </li>
            @endcan
            
            
            <li class="">
                <a href="{{url('products')}}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                             stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17
                              7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7"
                               x2="7.01" y2="7"></line></svg>
                        </div>
                        <span>PRODUCTOS</span>
                    </div>
                </a>
            </li>

            <li class="">
                <a href="{{url('pos')}}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21"
                               r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2
                                0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                        </div>
                        <span>VENTAS</span>
                    </div>
                </a>
            </li>

            
            <li class="">
                <a href="{{url('roles')}}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-key"><path d="M21 2l-2 2m-7.61
                               7.61a5.55.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22
                                7l-3-3m-3.5 3.5L19 4"></path></svg>
                        </div>
                        <span>ROLES</span>
                    </div>
                </a>
            </li>
           
            <li class="">
                <a href="{{url('permisos')}}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11
                               12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1
                                2-2h11"></path></svg>
                        </div>
                        <span>PERMISOS</span>
                    </div>
                </a>
            </li>
           
            <li class="">
                <a href="{{url('asignar')}}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                             stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11
                              8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        </div>
                        <span>ASIGNAR</span>
                    </div>
                </a>
            </li>
           
            <li class="">
                <a href="{{url('users')}}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0
                               0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 
                               21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                        <span>USUARIOS</span>
                    </div>
                </a>
            </li>
            
            <li class="">
                <a href="{{url('coins')}}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-stop-circle"><circle cx="12" cy="12" 
                             r="10"></circle><rect x="9" y="9" width="6" height="6"></rect></svg>
                        </div>
                        <span>MONEDAS</span>
                    </div>
                </a>
            </li>
            

            <li class="">
                <a href="{{url('cashout')}}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" 
                              x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 
                              7H6"></path></svg>
                        </div>
                        <span>ARQUEOS</span>
                    </div>
                </a>
            </li>

            <li class="">
                <a href="{{url('reports')}}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                             stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21
                              15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
                        </div>
                        <span>REPORTES</span>
                    </div>
                </a>
            </li>

            
            <li class="">
                <a href="{{url('providers')}}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                            </svg>
                        </div>
                        <span>PROVEEDORES</span>
                    </div>
                </a>
            </li>
            
            <li class="">
                <a href="{{url('companies')}}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                            </svg>
                        </div>
                        <span>INFORMACIÓN</span>
                    </div>
                </a>
            </li>
            

        </ul>
    </nav>
</div>