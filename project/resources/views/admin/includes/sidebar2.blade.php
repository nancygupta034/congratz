

   <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src=" " alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{\Auth::user()->name}}</p>
                  <p class="designation">{{\Auth::user()->role == 'master' ? ' Master Admin' : 'Super Admin'}}</p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Main Menu</li>


        

             <li class="nav-item">
                <a href="{{url(Auth::user()->role)}}" class="nav-link">
                   <i class="menu-icon typcn typcn-document-text"></i>
                  <span class="menu-title">Dashboard</span>
                </a>
            
            </li>


             <li class="nav-item @if(Auth::user()->role != 'master') hide @endif ">
                <a href=" " class="nav-link">
                  <i class="menu-icon typcn typcn-document-text"></i>
                  <span class="menu-title">Super Admin</span>
                </a>
                
              </li>

 


 
 



            <li class="nav-item">
              <a class="nav-link collapsed" data-toggle="collapse" href="#auth7" aria-expanded="false" aria-controls="auth7">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Samples</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth7">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item   ">
                      <a href=" " class="nav-link ">Sample Category</a>
                   </li>
                   <li class="nav-item  ">
                      <a href=" " class="nav-link ">Samples</a>
                   </li>
                  
                </ul>
              </div>
            </li>
  
       </div>
  </li>

  
 










    <li class="nav-item">
              <a class="nav-link collapsed" data-toggle="collapse" href="#auth91" aria-expanded="false" aria-controls="auth91">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Others</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth91">
                <ul class="nav flex-column sub-menu">
                           <li class="nav-item">
                                        <a href=" " class="nav-link">Customers</a>
                                        
                             </li>

                               <li class="nav-item">
                                        <a href=" " class="nav-link">Email Template</a>
                                        
                             </li>

                              <li class="nav-item">
                                        <a href=" " class="nav-link">Testimonials</a>
                                        
                             </li>  
                             <li class="nav-item">
                                        <a href=" " class="nav-link">Plateform</a>
                                        
                             </li>
                              <li class="nav-item">
                                  <a href=" " class="nav-link">Contact Address</a>
                              </li>
                              <li class="nav-item">
                                  <a href=" " class="nav-link">Entrepreneurs Videos</a>
                              </li>

                             <li class="nav-item">
                                    <a href=" " class="nav-link">Feature List</a>
                                 </li>
                  
                </ul>
              </div>
            </li>


 


            <li class="nav-item">
              <a class="nav-link collapsed" data-toggle="collapse" href="#auth9" aria-expanded="false" aria-controls="auth9">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Capture Area</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth9">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                    <a href=" " class="nav-link">
                       Capture Type</a>
                </li>
                 <li class="nav-item">
                    <a href=" " class="nav-link">
                    
                       Capture Dimensions  
                     
                    </a>
                </li>
                  
                </ul>
              </div>
            </li>

















 <li class="nav-item">
              <a class="nav-link collapsed" data-toggle="collapse" href="#auth10" aria-expanded="false" aria-controls="auth10">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title"> Faq Settings</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth10">
                <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                  <a href=" " class="nav-link"> Categories</a>
              </li>

               <li class="nav-item">
                  <a href=" " class="nav-link"> Questions</a>
              </li>

                <li class="nav-item">
                  <a href=" " class="nav-link"> Video</a>
              </li>
                  
                </ul>
              </div>
</li>






 <li class="nav-item">
              <a class="nav-link collapsed" data-toggle="collapse" href="#auth11" aria-expanded="false" aria-controls="auth11">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Content Settings</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth11">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                  <a href=" " class="nav-link"> Homepage 
                  </a>
              </li>
              <li class="nav-item">
                  <a href=" " class="nav-link"> Common Content
                      
                  </a>
              </li>
                  
                </ul>
              </div>
</li>



 
     



 <li class="nav-item">
              <a class="nav-link collapsed" data-toggle="collapse" href="#auth12" aria-expanded="false" aria-controls="auth12">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth12">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a href=" " class="nav-link"> 
                           Change Password
                        </a>
                        
                      </li>


                      <li class="nav-item">
                        <a href=" " class="nav-link">Profile Picture</a>
                        
                      </li>
                     


                       <li class="nav-item">
                        <a href=" " class="nav-link">
                            Logout</a>
                         </li>
                              
                </ul>
              </div>
</li>

 
 


  

 
          </ul>
        </nav>
        <!-- partial -->