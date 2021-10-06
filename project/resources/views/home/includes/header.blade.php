 <!-- HEADER CODE -->
        <header class="main-header">     
              <a href="/" class="logo" id="logo">
               <!--   <img src="{{url('frontend/images/logo.png')}}" alt="site-brand">
                 <img src="{{url('frontend/images/footer-logo.png')}}" alt="site-brand" class="sticky-logo">  -->  
                 <img src="{{url(WebsiteSettings('global-settings','logo'))}}" alt="site-brand">
                 <img src="{{url(WebsiteSettings('global-settings','logo_footer'))}}" alt="site-brand" class="sticky-logo">          
              </a>
              <ul class="contact-list">
                <li>
                  <a href="#search" class="search_btn"><i class="fas fa-search"></i></a>
                </li>
                <li class="nav-item dropdown lang-dropdown">
                 <a class="nav-link dropdown-toggle "  href="javascript:void(0)"  data-action="{{route('home.lang','en')}}" id="navbardrop" data-toggle="dropdown">
                  {{ Session::get('locale') }} <span class="dropdown_icon"><i class="fas fa-angle-down"></i></span>
                 </a>
                 <div class="dropdown-menu">
                   <a class="dropdown-item change-lang" data-action="{{route('home.lang','EN')}}"  href="javascript:void(0)">EN</a>
                  
                   <a class="dropdown-item change-lang" data-action="{{route('home.lang','AR')}}"  href="javascript:void(0)">AR</a>
                 </div>
                </li>
                @if(Auth::check())
                    <!-- <li><a href="{{route(Auth::user()->role.'.dashboard')}}" class="log-sign-btn">{{_lang(Auth::user()->name)}}</a></li> -->
                    <li class="nav-item dropdown cstm-profile-dropdowm">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="user-profile-pic"> <img class="img-profile rounded-circle" src="/images/artists/1624815642Rywq1jTCGQAqYAkCZBlZbjY7J1HG.jpeg"></span>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{_lang(Auth::user()->name)}}</span>
                                
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route(Auth::user()->role.'.dashboard')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                @if(Auth::user()->role !="admin")
                                <a class="dropdown-item" href="{{url(Auth::user()->role.'.Availability')}}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                @endif
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{url('/logout')}}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                @else
                     <li><a href="{{url('login')}}" class="log-sign-btn">{{_lang('Become Customer')}}</a></li>
                <li><a href="{{route('artist.login')}}" class="log-sign-btn">{{_lang('Become Celebrity')}}</a></li> 

                @endif
             </ul>            
          </header>
          <!-- overlay !-->
  <!-- overlay !-->
<form id="search" class="fade" action="{{route('home.search')}}">
    <a href="#" class="close-btn" id="close-search">
        <em class="fa fa-times"></em>
    </a>
    <input placeholder="Search here..." id="searchbox" type="search" name="search" re/>
</form>
<!--- /overlay -->        
     <!-- HEADER CODE END -->  