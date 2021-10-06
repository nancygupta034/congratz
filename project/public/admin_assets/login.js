var $emailTseturl = $("body").find('#authCheckFields').val();
$('#artistForm').validate({
onfocusout: function (valueToBeTested) {
  $(valueToBeTested).valid();
},
 
rules: {
  
  "name": {
      required: true,
      maxlength: 50, 
  },  
  "category": {
      required: true,
      maxlength: 50, 
  },
 "username": {

      required: true,
       maxlength: 50,
       remote: {
                  url: $emailTseturl,
                  type: "get"
      } 
  },
 'email': {
      required: true,
      email:true,
       remote: {
                  url: $emailTseturl,
                  type: "get"
      }

  },
  "phone_number": {
       required: true,
       number: true, 
        remote: {
                  url: $emailTseturl,
                  type: "get"
      }

  },
  'password': {
      required: true,
      minlength: 6,
      maxlength: 12,
  },
  'password_confirmation': {
     equalTo: "#password",
      minlength: 6,
      maxlength: 12,
  },
  valueToBeTested: {
      required: true,
  },
},
  messages: {

        email: {

            required: "Please enter your email address.",

            email: "Please enter a valid email address.",

            remote: "Email already in use!"

        },

        username: {

           

            remote: "Username is not available."

        },

        phone_number: {

 

            remote: "Phone Number already in use!"

        },

        

    },

 
}); 











/* Cstm Validations */

/*  Login Form Validations  */
jQuery("form[name='login']").validate({

    
    rules: {

      'email': 
      {
        required: true,
       
      },
      'password': 
      {
        required: true,
     
      }
   
    },     
});

jQuery("form[name='change-password']").validate({

    
    rules: {

      'password': 
      {
        required: true,
        nowhitespace: true,
      },
      'password_confirmation': 
      {
        required: true,
        nowhitespace: true,
        equalTo: "#password"

      }
   
    },     
});


jQuery("form[name='regional_setting']").validate({

  ignore: "",
    rules: {

      'regional': 
      {
        required: true,
      },
      'language':
      {
        required: true,
      },
      
      
    },
    
});

jQuery("form[name='change-password']").validate({

    
    rules: {

      'password': 
      {
        required: true,
        nowhitespace: true,

      },
      'password_confirmation': 
      {
        required: true,
        nowhitespace: true,
        equalTo: "#password"
      }
   
    },     
});


jQuery("form[name='changePasswordForteamMember']").validate({

    
    rules: {

      'password': 
      {
        required: true,
        nowhitespace: true
         
      },
      'password_confirmation': 
      {
        required: true
        

      }
   
    },     
});




/* Cstm Validations */
jQuery("form[name='resetingPasswordForm']").validate({

    
    rules: {

      'email': 
      {
        required: true,
        nowhitespace: true,
        customemail : true
      },
      'password': 
      {
        required: true,
        nowhitespace: true

      },
      'password_confirmation': 
      {
        required: true,
        nowhitespace: true

      }
   
    },     
});

/* Cstm Validations */
jQuery("form[name='resetPasswordForm']").validate({

    
    rules: {

      'email': 
      {
        required: true,
        nowhitespace: true,
        customemail : true
      } 
    },
         
});


jQuery("form[id='otpForm']").validate({

    
    rules: {

      'digit1': 
      {
        required: true,
        digits: true
      },
      'digit2': 
      {
        required: true,
        digits: true
      },
      'digit3': 
      {
        required: true,
        digits: true
      },
      'digit4': 
      {
        required: true,
        digits: true
      },
      'digit5': 
      {
        required: true,
        digits: true
      },
      'digit6': 
      {
        required: true,
        digits: true
      }
        
    },     
});








//-----------------------------------------------------------------------------------------------
//  login form submit function
//-----------------------------------------------------------------------------------------------

$("body").on('submit','#resetingPasswordForm',function(e){
   e.preventDefault();
    login_func($(this));
});






//-----------------------------------------------------------------------------------------------
//  login form submit function
//-----------------------------------------------------------------------------------------------

$("body").on('submit','form[name=login]',function(e){
   e.preventDefault();
    login_func($(this));
});




//-----------------------------------------------------------------------------------------------
//  login form submit function
//-----------------------------------------------------------------------------------------------

$("body").on('submit','form[name=register]',function(e){
   e.preventDefault();
    login_func($(this));
});



//-----------------------------------------------------------------------------------------------
//  RESEND OPT FOR TM FORGET PASSWORD
//-----------------------------------------------------------------------------------------------

$("body").on('click','.SecondOption',function(e){
   e.preventDefault();
    var $modal = $("body").find('#myForgetPasswordModal');
    sendRequestToBS_func($(this).attr('data-action'),$modal);
});


function sendRequestToBS_func($url,$this) {
   $.ajax({
                url : $url,
                type: 'GET',  
                 
                dataTYPE:'JSON',
                headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
                },
                beforeSend: function() {
                           $this.find('button').attr('disabled','true');
                },
                success: function (result) {
                     statusFunctionAccordingToResponse(result,$this);
                },
                complete: function() {
                         
                },
                error: function (jqXhr, textStatus, errorMessage) {
                     console.log('------------------------');
                     console.log(jqXhr);
                     console.log('------------------------');
                     console.log(textStatus);
                     console.log('------------------------');
                     console.log(errorMessage);
                }

    });
}


function login_func($this){
	    $loader = $("body").find('.custom-loading');
	  $.ajax({
                url : $this.attr('data-action'),
                type: 'POST',  
                data : $this.serialize(), 
                dataTYPE:'JSON',
                headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
                },
                beforeSend: function() {
                           $this.find('button').attr('disabled','true');
                           $loader.show();
                },
                success: function (result) {
                     //-------------------------------------------------------------
                     statusFunctionAccordingToResponse(result,$this);
                     $loader.hide();
                },
                complete: function() {
                         
                },
                error: function (jqXhr, textStatus, errorMessage) {
                     console.log('------------------------');
                     console.log(jqXhr);
                     console.log('------------------------');
                     console.log(textStatus);
                     console.log('------------------------');
                     console.log(errorMessage);
                }

    });

}



//--------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------



function statusFunctionAccordingToResponse(result,$this) {

      switch(result.status) {
        case 1:
        	     $this.find('.messageDiv').removeClass('alert alert-danger');
               $this.find('.messageDiv').addClass('alert alert-success');
               $this.find('.messageDiv').html(result.messages+' <span id="countDown">10 '+ " second's" +'</span>');
		       
             // $this.find('.messageDiv').html(result.messages);
               var $div = $this.find('.messageDiv');
               countDownTimmer(result.url,$div.find('#countDown'));
               //window.location.href = result.url;
               $this.find("#counter").attr('data-count',1);
                $("body").find("#counter").attr('data-count',1);
                $("body").find("#counter").attr('data-count-modal',0);
          break;
        case 2:
        
              $this.find('.messageDiv').html(result.messages);
              $("body").find('#verified-OTP-modal').modal({
                        backdrop: 'static',
                        keyboard: false
              });
                $("body").find('#messageDivAlert').html(result.messages);
               var $timmerDiv = $("body").find('#timerCountDown');
                $("body").find("#counter").attr('data-count-modal',0);
                window.location.href = result.url;
               //countDownTimmer(result.url,$timmerDiv);
          break;
        case 3:
              $this.find('.messageDiv').removeClass('alert alert-danger');
              $this.find('.messageDiv').addClass('alert alert-success');
              $this.find('.messageDiv').html(result.messages);
               setInterval(function() {
                     window.location.href = result.url;
               }, 2000);
          break;
        case 4:
             $this.find('.messageDiv').html(result.messages);
             var $attemps = parseInt($this.find('#attemps').val()) + 1;
             $this.find('#attemps').val($attemps);
             $this.find('button').removeAttr('disabled');
          break;
        case 5:
        		$this.find('.messageDiv').removeClass('alert alert-danger');
               $this.find('.messageDiv').addClass('alert alert-success');
               $this.find('.messageDiv').html(result.messages);
               $this[0].reset();
                $this.find('button').removeAttr('disabled');
                
          break;
          case 6:
               $this.find('.messageDiv').removeClass('alert alert-success');
              $this.find('.messageDiv').addClass('alert alert-danger');
               $this.find('.messageDiv').html(result.messages).fadeIn().fadeOut(4000);
                $this.find('button').removeAttr('disabled');
                
          break;
         
        default:
           $this.find('.messageDiv').removeClass('alert alert-success');
           $this.find('.messageDiv').addClass('alert alert-danger');
           $this.find('.messageDiv').html(result.messages);
           $this.find('button').removeAttr('disabled');
           break;
      }

 
 
}
















$("body").on('submit','#otpForm',function(e){
   e.preventDefault();
    login_func($(this));
});



//--------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------




$("body").on('submit','#resetPasswordForm',function(e){
   e.preventDefault();
    login_func($(this));
});





function countDownTimmer(url,$div) {
	var counter = 10;
    var interval = setInterval(function() {

      $("body").find("#counter").attr('data-count-modal',0);
      $("body").find("#counter").attr('data-count',1);
        
        if(parseInt(counter) > 0){
          counter--;
        }
        
        $div.html(counter+ " second's");	
        
    // Display 'counter' wherever you want to display it.
       if (counter == 0) {
                window.location.href = url;
       }
    }, 1000);

}