<style type="text/css">
  .dropdown.cstm-profile-dropdowm .dropdown-toggle {
    padding: 0;
    display: inline-flex;
    align-items: center;
    color: #333;
    letter-spacing: 1px;
}
.user-profile-pic {
    width: 30px;
    height: 30px;
    margin-right: 8px;
    display: inline-block;
    overflow: hidden;
    border-radius: 50%;
    border: 2px solid #d1d1d1;
}
.user-profile-pic img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}
/*.dash-card-wrap .small-box>.inner {
    min-height: 30vh;
}*/
</style>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown lang-dropdown">
                 <a class="nav-link dropdown-toggle "  href="javascript:void(0)"  data-action="{{route('home.lang','en')}}" id="navbardrop" data-toggle="dropdown">
                  {{ Session::get('locale') }} <span class="dropdown_icon"><i class="fas fa-angle-down"></i></span>
                 </a>
                 <div class="dropdown-menu">
                   <a class="dropdown-item change-lang" data-action="{{route('home.lang','EN')}}"  href="javascript:void(0)">EN</a>
                  
                   <a class="dropdown-item change-lang" data-action="{{route('home.lang','AR')}}"  href="javascript:void(0)">AR</a>
                 </div>
                </li>
      <li class="nav-item dropdown cstm-profile-dropdowm">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="user-profile-pic"> <img class="img-profile rounded-circle" src="/images/artists/1624815642Rywq1jTCGQAqYAkCZBlZbjY7J1HG.jpeg"></span>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{_lang('Admin')}}</span>
                                
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown" x-placement="bottom-end" style="position: absolute; transform: translate3d(-53px, 30px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item" href="/admin">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{_lang('Profile')}}
                                </a>
                                                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{_lang('Logout')}}
                                </a>
                            </div>
                        </li>
    </ul>
  </nav>