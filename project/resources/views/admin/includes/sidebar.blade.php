  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
     
            <img src="{{url(WebsiteSettings('global-settings','logo'))}}" alt="site-brand" style="width: 70%">
                 
       
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('adminLte')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('admin.dashboard')}}" class="d-block">{{_lang('Admin')}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p> {{_lang('Dashboard')}} </p>
            </a>
          </li>



         <li class="nav-item">
              <a class="nav-link collapsed" data-toggle="collapse" href="#auth91" aria-expanded="false" aria-controls="auth91">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">{{_lang('User Management')}}</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth91">
                <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                            <a href="{{route('admin.celebrity.list')}}" class="nav-link">
                              <i class="nav-icon fas fa-th"></i>
                              <p>{{_lang('Celebrity Listing')}}</p>
                            </a>
                          </li>
                        
                        
                           <li class="nav-item">
                            <a href="{{route('admin.customer.list')}}" class="nav-link">
                              <i class="nav-icon fas fa-th"></i>
                              <p>{{_lang('Customer Listing')}}</p>
                            </a>
                          </li>
                           <li class="nav-item">
                              <a href="{{route('admin.booking.list','pending')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>{{_lang('Booking')}}</p>
                              </a>
                            </li>
                </ul>
              </div>
            </li>


         
        
        
          
        
        

           <li class="nav-item">
            <a href="{{route('admin.category.list')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>{{_lang('Category')}}</p>
            </a>
          </li>
        
        
          
           <li class="nav-item">
            <a href="{{route('admin.event.list')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>{{_lang('Events')}}</p>
            </a>
          </li>
        
        
          
           <li class="nav-item">
            <a href="{{route('admin.packages.list')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>{{_lang('Subscription Packages')}}</p>
            </a>
          </li>
        
        
   
         <li class="nav-item">
              <a class="nav-link collapsed" data-toggle="collapse" href="#auth91-locations" aria-expanded="false" aria-controls="auth91-locations">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">{{_lang('Locations')}}</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth91-locations">
                <ul class="nav flex-column sub-menu">
                           <li class="nav-item">
            <a href="{{route('admin.country.list')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>{{_lang('Countries')}}</p>
            </a>
          </li>
          
           <li class="nav-item">
            <a href="{{route('admin.state.list')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>{{_lang('States')}}</p>
            </a>
          </li>
          
           <li class="nav-item">
            <a href="{{route('admin.city.list')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                 {{_lang('Cities')}}  
              </p>
            </a>
          </li>
                </ul>
              </div>
            </li>       
           
           
           
          <li class="nav-header">{{_lang('EXAMPLES')}}</li>
          <li class="nav-item">
            <a href="{{route('admin.cms')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>{{_lang('CMS Pages')}}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.jobs')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>{{_lang('Jobs')}}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.website.settings')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>{{_lang('Website Settings')}}</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.emailTemplate.list')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>{{_lang('Email Template')}}</p>
            </a>
          </li>
            <!-- <li class="nav-item">
            <a href="{{route('admin.website.globalSettings')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>Website Global Settings</p>
            </a>
          </li> -->
           <li class="nav-item">
            <a href="{{route('admin.website.languages')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>{{_lang('Website Language Settings')}}</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{route('admin.FAQs')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>{{_lang('FAQs')}}</p>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{route('admin.website.testimonials')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>{{_lang('Testimonials')}}</p>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>{{_lang('Logout')}}</p>
            </a>
          </li>
           
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>