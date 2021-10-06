

jQuery("#formTestimonial").validate({

    
    rules: {

      'name': 
      {
        required: true
        
      },'job_timing': 
      {
        required: true
        
      },'rating': 
      {
        required: true
        
      },'testimonial': 
      {
        required: true
        
      },
      
        
    },     
});

 


jQuery("#packageForm").validate({

    
    rules: {

      'label': 
      {
        required: true,
        
        
      },'days': 
      {
        required: true,
        number:true

        
      },'description': 
      {
        required: true
        
      },'title': 
      {
        required: true,
        number:true
        
        
      },
      
        
    },     
});

 


jQuery("form[id='jobForm']").validate({

    
    rules: {

      'title': 
      {
        required: true
        
      },'job_type': 
      {
        required: true
        
      },'job_timing': 
      {
        required: true
        
      },'description': 
      {
        required: true
        
      },'job_role': 
      {
        required: true
        
      },
      
        
    },     
});

 




jQuery("form#cmsForm").validate({

    
    rules: {

       'title':{
        required: true
        },
        'description':{
        required: true
        },
       'meta_title': 
       {
        required: true
        },
       'meta_tags': 
       {
        required: true
       },
       'meta_description': 
       {
        required: true
       } 
   
    },     
});






/* Cstm Validations */

/*  Login Form Validations  */
jQuery("form#categoryForm").validate({

    
    rules: {

       'label': 
       {
        required: true
        },
       'meta_title': 
       {
        required: true
        },
       'meta_tags': 
       {
        required: true
       },
       'meta_description': 
       {
        required: true
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
jQuery("#eventForm").validate({

    
    rules: {

      'label': 
      {
        required: true,
      
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

$("body").on('submit','#packageForm',function(e){
   e.preventDefault();
    login_func($(this));
});




//-----------------------------------------------------------------------------------------------
//  login form submit function
//-----------------------------------------------------------------------------------------------

$("body").on('submit','#jobForm',function(e){
   e.preventDefault();
    login_func($(this));
});





//-----------------------------------------------------------------------------------------------
//  login form submit function
//-----------------------------------------------------------------------------------------------

$("body").on('submit','#cmsForm',function(e){
   e.preventDefault();
    login_func($(this));
});



//-----------------------------------------------------------------------------------------------
//  login form submit function
//-----------------------------------------------------------------------------------------------

$("body").on('submit','#eventForm',function(e){
   e.preventDefault();
    login_func($(this));
});




//-----------------------------------------------------------------------------------------------
//  login form submit function
//-----------------------------------------------------------------------------------------------

$("body").on('submit','#categoryForm',function(e){
   e.preventDefault();
    submitFormWithFile($(this));
});



//-----------------------------------------------------------------------------------------------
//  login form submit function
//-----------------------------------------------------------------------------------------------

$("body").on('submit','#categoryForm2',function(e){
   e.preventDefault();
    login_func($(this));
});






//-----------------------------------------------------------------------------------------------
//  login form submit function
//-----------------------------------------------------------------------------------------------

$("body").on('submit','#login',function(e){
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
                     //-------------------------------------------------------------

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
	 let $loader = $("body").find('.loader');
	  $.ajax({
                url : $this.attr('data-action'),
                type: 'POST',  
                data : $this.serialize(), 
                dataTYPE:'JSON',
                headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
                },
                beforeSend: function() {
                           $loader.show();
                           $this.find('button').attr('disabled','true');
                },
                success: function (result) {
                     //-------------------------------------------------------------
                     statusFunctionAccordingToResponse(result,$this);
                },
                complete: function() {
                           $loader.show();
                         
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
     let $loader = $("body").find('.loader');
      switch(result.status) {
        case 1:
        	     $this.find('.messageDiv').removeClass('alert alert-danger');
               $this.find('.messageDiv').addClass('alert alert-success');
               $this.find('.messageDiv').html(result.messages);
               var $div = $this.find('.messageDiv');
               setInterval(function() {
                     window.location.href = result.url;
               }, 1500);
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
                $loader.hide();
                
          break;
         
        default:
           $this.find('.messageDiv').removeClass('alert alert-success');
           $this.find('.messageDiv').addClass('alert alert-danger');
           $this.find('.messageDiv').html(result.messages);
           $this.find('button').removeAttr('disabled');
           $loader.hide();
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
        
        if(counter != 0){
          counter--;
        }
        if($('html')[0].lang == 'en')
        {
        $div.html(counter+ " second's");	
        }
    	else if($('html')[0].lang == 'ar')
    	{
    		$div.html(counter+ " الثانية ");
    	}
    // Display 'counter' wherever you want to display it.
     if (counter == 0) {
                window.location.href = url;
       }
    }, 1000);

}





//-----------------------------------------------------------------------------------------------
//  login form submit function
//-----------------------------------------------------------------------------------------------

$("body").on('submit','#formTestimonial',function(e){
   e.preventDefault();
    submitFormWithFile($(this));
});




function submitFormWithFile($this) {
   var form = $this[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        var percent = $('body').find('.percent');
        var bar = $('.bar');
        let $loader = $("body").find('.loader');
        $.ajax({
           url: $this.attr('data-action'),
           method:"POST",
           data:formData,
           dataType:'JSON',
           contentType: false,
           cache: false,
           processData: false,
           headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
           },
           beforeSend: function() {
               $loader.show();
           },
           xhr: function () {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function (evt) {
                if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                   // $('.progress').find('span.sr-only').text(percentComplete + '%');
                    //$('.progress .progress-bar').css('width', percentComplete + '%');
                }
            }, false);
            return xhr;
          },

           success: function (result) {
                   statusFunctionAccordingToResponse(result,$this);
           },

   });
}