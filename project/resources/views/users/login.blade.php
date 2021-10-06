<!DOCTYPE html>
<html>
   <head>
      <title>Congratz</title> 
      <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
      <link rel="icon" href="images/favicon.ico" type="image/x-icon">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.rawgit.com/michalsnik/aos/2.0.4/dist/aos.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <link href="<?= url('frontend/css/owl.carousel.min.css')?>" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?= url('frontend/css/animate.css')?>">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
      <link rel="stylesheet" type="text/css" href="<?= url('frontend/css/style.css')?>">
      <link rel="stylesheet" type="text/css" href="<?= url('frontend/css/login.css')?>">
      <link rel="stylesheet" type="text/css" href="<?= url('frontend/css/responsive.css')?>">
   </head>
   <body>
    <div class="container" id="formContainer">
      <div class="forms-container">
        <div class="signin-signup">
          <form class="sign-in-form" data-action="{{route('ajax.login')}}" name="login">
                      <div class="messageDiv {{Request::has('type') ? 'alert alert-warning' : ''}} ">
                           {{Request::has('type') ? Request::get('type') : ''}}
                      </div>
                      @csrf
                <div class="form_body">
                    <h2 class="title">Sign in</h2>
					            <div class="input-field">
					              <i class="fas fa-user"></i>
					              <input type="email" name="email" placeholder="Enter Email">
					            </div>
					            <div class="input-field">
					              <i class="fas fa-lock"></i>
					              <input type="password" name="password" id="" placeholder="Enter Password" minlength="6">
					            </div>
                                <input type="submit" value="Login" class="main-btn white-btn" >


        
 
                </div>
                        <div class="form_footer text-center">
				            <p class="social-text">Or Sign in with social platforms</p>

				            <div class="social-media">
				              <a href="#" class="social-icon">
				                <i class="fab fa-facebook-f"></i>
				              </a>
				              <a href="#" class="social-icon">
				                <i class="fab fa-twitter"></i>
				              </a>
				              <a href="#" class="social-icon">
				                <i class="fab fa-google"></i>
				              </a>
				              <a href="#" class="social-icon">
				                <i class="fab fa-linkedin-in"></i>
				              </a>
				            </div>
                        </div>
          </form>
          <form action="#" class="sign-up-form">





            <div class="form_body">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" />
            </div>
            <input type="submit" class="btn" value="Sign up" />
          </div>
            <div class="form_footer text-center">
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="main-btn blue-btn" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="images/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="main-btn blue-btn" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="images/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

        <!-- Scripting starts here -->
      <!-- <script src="https://code.jquery.com/jquery-3.1.0.js"></script> -->
      <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://cdn.rawgit.com/michalsnik/aos/2.0.4/dist/aos.js"></script>
      <script src="<?= url('/frontend/js/animation.js')?>"></script>    
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/debug.addIndicators.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.6/gsap.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.6/MotionPathPlugin.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineMax.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
      <script type="text/javascript" src="<?= url('/frontend/js/owl.carousel.min.js')?>"></script>
      <script type="text/javascript" src="https://www.land-of-web.com/wp-content/uploads/2016/08/parallax.js"></script>
      <!-- Smooth scroll -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/gsap.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/ScrollTrigger.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.min.js"></script>
      <script type="text/javascript" src="<?= url('/frontend/js/custom-gsap.js')?>"></script>
      <script type="text/javascript" src="<?= url('/frontend/js/custom.js')?>"></script>
      <script>
AOS.init();

      </script>

 <script src="{{url('adminLte')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> 
 <script type="text/javascript" src="{{url('admin_assets/login.js')}}"></script>
  </body>
</html>
