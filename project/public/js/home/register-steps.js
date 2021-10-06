$(function(){



$.validator.addMethod("minAge", function(value, element, min) {

    var today = new Date();

    var birthDate = new Date(value);

    var age = today.getFullYear() - birthDate.getFullYear();

 

    if (age > min+1) { return true; }

 

    var m = today.getMonth() - birthDate.getMonth();

 

    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) { age--; }

 

    return age >= min;

}, "Escort must be have age greater than 18 yrs!");







$("body").on('click','.signupVendor',function(e){

    e.preventDefault();

    var $id = $(this).attr('data-type');

    var $signupAs = $(this).text();

    var $this = $("body").find('#sign_up_client');

    $this.find('#userType').val($id);

    $this.find('#signupAs').text($signupAs);

              $this.modal({

                            backdrop: 'static',

                            keyboard: false

              });

});









// $("body").on('click','.signupClient',function(e){

//     e.preventDefault();

    

//               $("body").find('#sign_up_client').modal({

//                             backdrop: 'static',

//                             keyboard: false

//               });





// });





$("body").on('click','.signupEscortPopup',function(e){

    e.preventDefault();

              $("body").find('#sign_up_escort').modal({

                            backdrop: 'static',

                            keyboard: false

              });

});











//-------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------
















 var $emailTseturl = $("body").find('#sign_escort').attr('data-action');
 var $limit = $("body").find('#sign_escort').attr('data-limit');
 $('#sign_escort').validate({
 onfocusout: function (valueToBeTested) {
    $(valueToBeTested).valid();
 },
 highlight: function(element) {
   $('element').removeClass("error");
},
 rules: {
   "name": {
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
   "phone_number": {
       required: true,
       number: true, 
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
   'password': {
      required: true,
      minlength: 6,
      maxlength: 12,
  },
   'password_confirmation': {
      equalTo: "#password",
      required:true,
      minlength: 6,
      maxlength: 12,
  },
  'address': {
      required: function(){
         if(parseInt($('#registerPopupSteps').val()) > 1){
               return true;
          }else{
              return false;
          }
      }
  }, 
  'country': {
      required: function(){
         if(parseInt($('#registerPopupSteps').val()) > 1){
               return true;
          }else{
              return false;
          }
      }
  },
  'state_name': {
      required: function(){
          if(parseInt($('#registerPopupSteps').val()) > 1){
               return true;
          }else{
               return false;
          }
      }
  }, 
 'city_name': {
      required: function(){
          if(parseInt($('#registerPopupSteps').val()) > 1){
               return true;
          }else{
               return false;
          }
      }
  }, 
  'pincode': {
      number:true,
      required: function(){
          if(parseInt($('#registerPopupSteps').val()) > 1){
               return true;
          }else{
               return false;
          }
      }
  }, 
'profile_picture': {
      required: function(){
          if(parseInt($('#registerPopupSteps').val()) > 2){
               return true;
          }else{
               return false;
          }
      }
  }, 
'dob': {
      required: function(){
          if(parseInt($('#registerPopupSteps').val()) > 2){
               return true;
          }else{
               return false;
          }
      }
  }, 
'about': {
      required: function(){
          if(parseInt($('#registerPopupSteps').val()) > 2){
               return true;
          }else{
               return false;
          }
      }
  }, 
'where_can_we_find': {
      required: function(){
          if(parseInt($('#registerPopupSteps').val()) > 3){
               return true;
          }else{
               return false;
          }
      }
  }, 
  'profile_id': {
      required: function(){
          if(parseInt($('#registerPopupSteps').val()) > 3){
               return true;
          }else{
               return false;
          }
      }
  }, 
  'followers': {
       number:true,
      required: function(){
          if(parseInt($('#registerPopupSteps').val()) > 3){
               return true;
          }else{
               return false;
          }
      }
  }, 
'delivery_within': {
       number:true,
       max:parseInt($limit),

      required: function(){
          if(parseInt($('#registerPopupSteps').val()) > 4){
               return true;
          }else{
               return false;
          }
      }
  }, 
'charge': {
       number:true,
      required: function(){
          if(parseInt($('#registerPopupSteps').val()) > 4){
               return true;
          }else{
               return false;
          }
      }
  }, 
'i_agree': {
      required: function(){
          if(parseInt($('#registerPopupSteps').val()) > 4){
               return true;
          }else{
               return false;
          }
      }
  }, 
 valueToBeTested: {
     required: true,
 }



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









var $divID = $("body").find('#RegisterCountry');

countryRegisterCountry(0,0,$divID);

 







$("body").on('change','#RegisterCountry',function(){

    var val = $( this ).val();

    var $divID = $("body").find('#RegisterState');

    countryRegisterCountry(val,0,$divID);
    getCurrency(val);
});


function getCurrency(country_id) {
    var $this = $("body").find('#getCurrency');
    $.ajax({
               url : $this.attr('data-action'),
               data : {
                    country_id:country_id
               },
               type: 'GET',  // http method
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
               success: function (data) {
                     $this.html(data);
               },
                error: function (jqXhr, textStatus, errorMessage) {

                     alert('error');
                }
    });
}

$("body").on('change','#RegisterState',function(){

    var val = $( this ).val();

    var $divID = $("body").find('#RegisterCity');

    countryRegisterCountry(0,val,$divID);

});





function countryRegisterCountry(country_id,state_id,$divID) {

       var $ajaxCountriesRoute = $("body").find('#ajaxCountriesRoute').val();

       $.ajax({

               url : $ajaxCountriesRoute,

               data : {

                country_id:country_id,

                state_id:state_id

               },

               type: 'GET',  // http method

               dataTYPE:'JSON',

               headers: {

                 'X-CSRF-TOKEN': $('input[name=_token]').val()

               },

                beforeSend: function() {

                   

                },

                 success: function (data) {

 

                    $divID.html(data);

                },

                error: function (jqXhr, textStatus, errorMessage) {

                     alert('error');

                }



        });



}

 















//----------------------------------------------------------------------------------------







$("body").on('click','#nextBtn',function(e){
   e.preventDefault();
 });











//-------------------------------------------------------------------------------------------



$("body").on('submit','#sign_escort',function(e){

     e.preventDefault();

     var $this = $(this);

     if($this.valid()){
          functionCompleteStep($this);
     }
 });







//-------------------------------------------------------------------------------------------



function functionCompleteStep($this) {

    

   var $next = parseInt($this.find('#registerPopupSteps').val()) + 1;

  switch($next) {

  case 1:

         stepShowHide(1);

    break;

  case 2:

         stepShowHide(2);

    break;

  case 3:

         stepShowHide(3);

    break;

  case 4:

         stepShowHide(4);

    break;
 case 5:

         stepShowHide(5);

    break;

  case 6:
      
         registerEscort($this); 

    break;

  default:

    // code block

}

}

////--------------------------------------------------------------------------------















function registerEscort($th) {

            var $this = $("body").find('#sign_escort');

            var form = $('body').find('#sign_escort')[0]; // You need to use standard javascript object here

            var formData = new FormData(form);

            var percent = $('body').find('.percent');

            var bar = $('.bar');





    $.ajax({

           url : $this.attr('action'),

           data : formData,

           type: 'POST',  // http method

           dataTYPE:'JSON',

           contentType: false,

           cache: false,

           processData: false,

           beforeSend: function() {

                    $("body").find('.custom-loading').show();

                   // $("body").find('.custom-loading').show();

                    $this.find('button.btn-ctm').attr('disabled','true');



          },

           xhr: function () {

            var xhr = new window.XMLHttpRequest();

            xhr.upload.addEventListener("progress", function (evt) {

                if (evt.lengthComputable) {

                    var percentComplete = evt.loaded / evt.total;

                    percentComplete = parseInt(percentComplete * 100);

                   // $('.progress').find('span.sr-only').text(percentComplete + '%');

                   // $('.progress .progress-bar').css('width', percentComplete + '%');

                }

            }, false);

            return xhr;

          },

           success:function(data)

           {

                   if(parseInt(data.status) == 1){
                            $this[0].reset();
                            $this.find('.messages').html(ErrorMsg('success',data.message));

 

                            setTimeout(function () {

                              window.location.href = data.url;

                              return true;

                             },3000);



                      }else{



                        $this.find('.loading').hide();

                         $("body").find('.custom-loading').hide();

                        $this.find('button.btn-ctm').removeAttr('disabled');

                        $this.find('.messages').html(erorrMessage(data.errors));



                        setTimeout(function () {

                                 $this.find('.messages').html('');

                        },8000);

                         

                      }



           }



          });

 



           return false;

}



























function stepShowHide($num) {

     var $this = $("body").find('#sign_escort');



     switch($num) {

        case 1:

             showStpPopup(1);

          break;

       case 2:

             showStpPopup(2);

          break;

          case 3:

             showStpPopup(3);

          break;

          case 4:

             showStpPopup(4);

          break;



         case 5:

             showStpPopup(5);

          break;

         case 6:

             showStpPopup(6);

          break;



          case 7:

             showStpPopup(7);

          break;



        default:

          // code block

      }







}



function showStpPopup($no) {
   var $this = $("body").find('#sign_escort');
   $this.find('#registerPopupSteps').val($no);
   $this.find('.tab').hide();
   $this.find('#stepComplete-'+$no).show();
   $this.find('#barStep-'+$no).addClass('active');
   if(parseInt($no) > 0){
      $this.find('#lastStep').show();
       defaultPopupSettings();
   }
   for (var i = 1; i <= 8; i++) {
       if(i < $no){
           $("body").find('#popup-active-'+i).addClass('active');
        }else{
           $("body").find('#popup-active-'+i).removeClass('active');
        }
   }
}

////--------------------------------------------------------------------------------



$("body").on('click','#lastStep',function(e){
    e.preventDefault();
    var $this = $("body").find('#sign_escort');
    var $last = parseInt($this.find('#registerPopupSteps').val());
    if($last > 1){
        var $no = ($last - 1);
        showStpPopup($no) 
     }
});





//---------------------------------------------





function defaultPopupSettings(){

   $("body").find('.inCallHide').hide();

   $("body").find('.outCallHide').hide();

   if($("body").find('#checkavailability1').is(':checked')){

      $("body").find('.inCallHide').show();

      //alert(1);

   }
 if($("body").find('#checkavailability2').is(':checked')){

      $("body").find('.outcallHide').show();

     // alert(1);

    }

}















/*----------------------------------------------------------------------------

|

|   Business filter

|_____________________________________________________________________________

*/







 function ErrorMsg(type,message){



      var txt  ='';

          txt +='<div class="alert alert-'+type+'" role="alert">';

          txt +=message;

          txt +='</div>';



          return txt;

  }





/*----------------------------------------------------------------------------

|

|   Business filter

|_____________________________________________________________________________

*/



function erorrMessage(errors) {



      var txt ="";

      $.each(errors, function( index, value ) {

        txt += ErrorMsg('warning',value);

          

      });

      return txt;

}



















});