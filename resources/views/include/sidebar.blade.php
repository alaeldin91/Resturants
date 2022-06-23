<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="">
            <div class="logo-img">
               <img height="60" src="{{ asset('img/logo.png')}}" class="header-brand-img" title="Resturant"> 
            </div>
        </a>
        <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>
        <button id="sidebarClose" class="nav-close" ><i class="ik ik-x" style="background:white;"></i></button>
    </div>

    @php
        $segment1 = request()->segment(1);
        $segment2 = request()->segment(2);
    @endphp
    
    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
                    <a href="#"><i class="ik ik-home"></i><span>{{ __('Dashboard')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'UserManager') ? 'active' : '' }}">
                    <a href="#"><i class="ik ik-users"></i><span>{{ __('Manage User')}}</span></a>
                </div>
                
                <div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
                    <a href="#"><i class="ik ik-briefcase"></i><span>{{ __('Manage Catogry')}}</span></a>
                </div>   
                <div class="nav-item {{ ($segment1 == 'subCatogry') ? 'active' : '' }}">
                    <a href="#"><i class="ik ik-clipboard"></i><span>{{ __('Manage Sub Catogry')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
                    <a href="#"><i class="ik ik-map-pin"></i><span>{{ __('Manage Location')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
                    <a href="#"><i class="ik ik-shopping-cart"></i><span>{{ __('Manage Store')}}</span></a>
                </div> 
                <div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
                    <a href="#"><i class="ik ik-tablet"></i><span>{{ __('Manage Product')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
                    <a href="#"><i class="ik ik-credit-card"></i><span>{{ __('Manage Payment')}}</span></a>
                </div> 
                <div class="nav-item {{ ($segment1 == ' Customers') ? 'active' : '' }}">
                    <a href="#"><i class="ik ik-user"></i><span>{{ __('Manage Customer')}}</span></a>
                </div>  
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-bar-chart-2"></i><span>{{ __('Report')}}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        <a href="#" class="menu-item {{ ($segment1 == 'users') ? 'active' : '' }}">{{ __('Sales Reports')}}</a>
                        <a href="#" class="menu-item {{ ($segment1 == 'user' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Sales Report By Product')}}</a>
                         <!-- only those have manage_role permission will get access -->
                        <a href="#" class="menu-item {{ ($segment1 == 'roles') ? 'active' : '' }}">{{ __('Sales Report By Customer')}}</a>
                        <!-- only those have manage_permission permission will get access -->
                        
                    </div>
                </div>       
               </div>
               
            </div>



        </div>