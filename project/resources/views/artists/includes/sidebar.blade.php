  <aside class="dash_sidebar" id="dashSidebar">
         <a class="sidebar_toggle" href="javascript:void(0);"><span class="icon-right-arrow-angle"></span></a>
         <div class="sidebar_container">
            <div class="dash_logo">
               <a href="javascript:void();" class="lgog">
                   <img src="{{url(WebsiteSettings('global-settings','logo'))}}" alt="site-brand">
                </a>
            </div>
            <div class="sidebar_block">
               <div class="sidebar_profile"  >
                  <figure class="profile_logo">
                   <img id="artist_profile_photo" src="{{!empty(Auth::user()->profile_picture) ? url(Auth::user()->profile_picture) : url('/frontend/images/Justin-Bieber-img.jpg')}}">
                  </figure>
                  <div class="profile-infomation">
                     <h3 class="pro_name">{{_lang(Auth::user()->name)}}</h3>
                     <h6 class="accout_name">{{_lang(Auth::user()->username)}}</h6>
                     <ul class="profile_actions">
                        <li>
                           <a href="{{route('artist.dashboard')}}" class="profile_action_btn <?=ActiveMenus(['artist.dashboard','artist.profile'],'active')?>"><i class="fa fa-home" aria-hidden="true"></i></a>
                        </li>
                        <li>
                           <a href="javascript:void();" class="profile_action_btn  "><i class="fa fa-bell" aria-hidden="true"></i></a>
                        </li>
                        <li>
                           <a href="{{route('artist.Availability')}}" class="profile_action_btn <?=ActiveMenus(['artist.Availability'],'active')?>"> <i class="fa fa-cog" aria-hidden="true"></i></a>
                        </li> 
                        <li>
                           <a href="{{route('logout')}}" class="profile_action_btn"> <i class="fa fa-power-off" aria-hidden="true"></i></a>
                        </li>                       
                     </ul>
                  </div>
               </div>
               <nav class="sidebar_nav">
                  <ul class="navigation">
                     <li>
                        <a href="{{route('artist.profile')}}" class="nav-link <?=ActiveMenus(['artist.profile','artist.profile.edit','artist.dashboard'],'active')?>">
                           <span class="nav-icon"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                           <h4>{{_lang('My Profile')}}</h4>
                        </a>
                     </li>
                     <li>
                        <a href="{{route('artist.inviteUser')}}" class="nav-link <?=ActiveMenus(['artist.inviteUser'],'active')?>">
                           <span class="nav-icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                           <h4>{{_lang('Invite User')}}</h4>
                        </a>
                     </li>
                     <li>
                        <a href="{{route('artist.subscription.list')}}" class="nav-link <?=ActiveMenus(['artist.subscription','artist.subscription.list'],'active')?>">
                           <span class="nav-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                           <h4>{{_lang('Subscription')}}</h4>
                        </a>
                     </li>
                     <li>
                        <a href="{{route('artist.myBooking')}}" class="nav-link <?=ActiveMenus(['artist.myBooking','artist.changeBookingDetail'],'active')?>">
                           <span class="nav-icon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                           <h4>{{_lang('Booking')}}</h4>
                        </a>
                     </li>
                     <li>
                        <a href="{{route('artist.myvideos')}}" class="nav-link <?=ActiveMenus(['artist.myvideoProfileSetting','artist.myvideos','artist.myvideos.detail'],'active')?>">
                           <span class="nav-icon"><i class="fa fa-video-camera" aria-hidden="true"></i></span>
                           <h4>{{_lang('Personalized Videos')}}</h4>
                        </a>
                     </li>
                  </ul>
               </nav>
            </div>
         </div>
      </aside>