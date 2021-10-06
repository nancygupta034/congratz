<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">                
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="https://cdn0.iconfinder.com/data/icons/account-avatar/128/user_-512.png" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>Hello, Admin</p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="active">
                <a href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                
                  <li class="">
                    <a href="{{ route('admin.escort.listing') }}">
                        <i class="fa fa-globe"></i> <span>Escorts</span> 
                    </a>
                </li>    
 <li class="">
                    <a href="{{ route('admin.escort.videolisting') }}">
                        <i class="fa fa-globe"></i> <span>Escort Videos</span> 
                    </a>
                </li>    
 <li class="">
                    <a href="{{ route('admin.escort.imagelisting') }}">
                        <i class="fa fa-globe"></i> <span>Escort Images</span> 
                    </a>
                </li>    

                <li class="">
                    <a href="{{ route('admin.countryListing') }}">
                        <i class="fa fa-globe"></i> <span>Country Management</span> 
                    </a>
                </li>                

                <li class="">
                    <a href="{{ route('admin.stateListing') }}">
                        <i class="fa fa-globe"></i> <span>State Management</span> 
                    </a>
                </li>

                <li class="">
                    <a href="{{ route('admin.cityListing') }}">
                        <i class="fa fa-globe"></i> <span>City Management</span> 
                    </a>
                </li>   

                <li class="">
                    <a href="{{ route('admin.serviceListing') }}">
                        <i class="fa fa-list"></i> <span>Services Management</span> 
                    </a>
                </li>

                <li class="">
                    <a href="{{ route('admin.serviceListing') }}">
                        <i class="fa fa-usd"></i> <span>Currency Management</span> 
                    </a>
                </li>

                <li class="">
                    <a href="{{ route('admin.ethnicitiesListing') }}">
                        <i class="fa fa-users"></i> <span>Ethnicities Management</span> 
                    </a>
                </li>                

                <li class="">
                    <a href="{{ route('admin.heightListing') }}">
                        <i class="fa fa-text-height"></i> <span>Height Management</span> 
                    </a>
                </li>
               <li class="">
                    <a href="{{ route('admin.weightListing') }}">
                        <i class="fa fa-text-height"></i> <span>Weight Management</span> 
                    </a>
                </li>

                <li class="">
                    <a href="{{ route('admin.looksListing') }}">
                        <i class="fa fa-circle"></i> <span>Looks Management</span> 
                    </a>
                </li> 
                <li class="">
                    <a href="{{ route('admin.events.list') }}">
                        <i class="fa fa-circle"></i> <span>Event Management</span> 
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('admin.roomlet.listing','category') }}">
                        <i class="fa fa-circle"></i> <span>Room Let Category</span> 
                    </a>
                </li> 
                <li class="">
                    <a href="{{ route('admin.roomlet.listing','service') }}">
                        <i class="fa fa-circle"></i> <span>Room Let Services</span> 
                    </a>
                </li> 
                <li class="">
                    <a href="{{ route('admin.roomlet.listing','amenity') }}">
                        <i class="fa fa-circle"></i> <span>Room Let Amenities</span> 
                    </a>
                </li> 
                <li class="">
                    <a href="{{ route('admin.roomlet.listing','videoCategory') }}">
                        <i class="fa fa-circle"></i> <span>Video Categories</span> 
                    </a>
                </li>  
                <li class="">
                    <a href="{{ route('admin.roomlet.listing','productCategory') }}">
                        <i class="fa fa-circle"></i> <span>Product Categories</span> 
                    </a>
                </li> 
            </ul>    
        </section>
        <!-- /.sidebar -->
    </aside>
    
</div><!-- ./wrapper -->