// $image_crop = $('#upload-image').croppie({
//   enableExif: true,
//   viewport: {
//     width: 500,
//     height: 500,
//     type: 'square'
//   },
//   boundary: {
//     width: 600,
//     height: 600
//   }
// });
// $('#images').on('change', function () { 
//   var $uploadimage = $("body").find('#upload-image'); 
//       $uploadimage.show();
//       $("body").find('.cropped_image').show();
//       $("body").find('.btn-form-submit').hide();
//   var reader = new FileReader();
//   reader.onload = function (e) {
//     $image_crop.croppie('bind', {
//       url: e.target.result
//     }).then(function(){
//       console.log('jQuery bind complete');
//     });     
//   }
//   reader.readAsDataURL(this.files[0]);
// });



// $('.cropped_image').on('click',function(ev){
//       $image_crop.croppie('result',{
//         type: 'canvas',
//         size: 'viewport'
//       }).then(function (response) {
//             $("#file_name").val(response);
//             $("body").find('.cropped_image').hide();
//             $("body").find('.btn-form-submit').show();
//       });
// });

 //--------------------------------------------------------------------------------------
 // category load function
 //--------------------------------------------------------------------------------------

  $('#parent').on('change',function(){
      var val = $( this ).val();
      $("#subparent").html('<option value="0">select</option>');
      getSubCategoryByCategoryId();
  });


 //--------------------------------------------------------------------------------------
 // category load function
 //--------------------------------------------------------------------------------------

function notification_msg(message,$type=null) {
  swal({
      title: '',
      text: message,
      showConfirmButton: true,
      confirmButtonText: 'Ok!',
      closeOnConfirm: true,
  });
}


 //--------------------------------------------------------------------------------------
 // category load function
 //--------------------------------------------------------------------------------------


  function getSubCategoryByCategoryId() {
      var $url = $("body").find('#category_url').val();
      var val = $('select#parent option:selected').val();
       var parent = parseInt(val) == 0 ? null : val;
      $.ajax({
          url: $url,
          data:{
              'parent': parent,
              'subparent':0
          },
          dataTYPE: 'json',
          success: function(result){
               var text ='<option value="0">select</option>';
               $.each(result, function( index, key ) {
                   text +='<option value="'+key.id+'">'+key.label+'</option>';
               });
               $("#subparent").html(text);
          }
        });
  }

 
 //--------------------------------------------------------------------------------------
 // category load function
 //--------------------------------------------------------------------------------------

$("body").on('change','.allChecks',function(e){
   e.preventDefault();
   var $this = $( this ); 
   if($this.is(':checked')){
     $($this.data('class')).prop('checked', true);
   }else{
      $($this.data('class')).prop('checked', false);
   }
});
 
 //--------------------------------------------------------------------------------------
 // category load function
 //--------------------------------------------------------------------------------------


$("body").on('submit','#youtubeForm',function(e){
   e.preventDefault();

    
        upload_form_file_with_ckeditor($(this));
   
   
 });

 
 //--------------------------------------------------------------------------------------
 // category load function
 //--------------------------------------------------------------------------------------


$("body").on('submit','#storyForm',function(e){
   e.preventDefault();

    var messageLength = CKEDITOR.instances['subject'].getData().replace(/<[^>]*>/gi, '').length;
    var $subject = $("body").find('#ckedit');
     $subject.text('')
    if( !messageLength ) {
        $subject.show().text( 'This is required');
        e.preventDefault();
    }else{
        upload_form_file_with_ckeditor($(this));
    }
   
 });



$("body").on('submit','#registerForm',function(e){
   e.preventDefault();
   var $this = $(this)
   upload_form_file($this);
 });



$("body").on('click','#artistFormBtn',function(e){
   e.preventDefault();
   var $this = $("body").find('#artistForm');
   upload_form_file($this);
 });



$("body").on('submit','#categoryForm2',function(e){
   e.preventDefault();
   upload_form_file($(this));
 });



 function upload_form_file($this) {
       var form = $this[0]; // You need to use standard javascript object here
       var formData = new FormData(form);
       var percent = $('body').find('.percent');
       var bar = $('.bar');
       
       $.ajax({
           url:$this.data('action'),
           method:"POST",
           data:formData,
           dataType:'JSON',
           contentType: false,
           cache: false,
           processData: false,
           beforeSend: function() {
              $('body').find('.progress').show();
              $('.progress').find('span.sr-only').text('0%');
              $this.find("button[type='submit']").attr('disabled','true');
              $("body").find('.custom-loading').show();
           },
           xhr: function () {
             var xhr = new window.XMLHttpRequest();
             xhr.upload.addEventListener("progress", function (evt) {
              if (evt.lengthComputable) {
                  var percentComplete = evt.loaded / evt.total;
                   percentComplete = parseInt(percentComplete * 100);
                   $('.progress').find('span.sr-only').text(percentComplete + '%');
                   $('.progress .progress-bar').css('width', percentComplete + '%');
               }
           }, false);
              return xhr;
          },

           success:function(data)
           {
                  
                if(parseInt(data.status) == 1){
                 
                     form.reset();
                     notification_msg(data.message,'success');
                    // $this.find("button[type='submit']").removeAttr('disabled');
                     $("body").find('.custom-loading').hide();
                       
                     window.location.href = data.url;

                     return true;
                  }else if(parseInt(data.status) == 2){
                     
                     notification_msg(data.message);
                     $this.find('button').removeAttr('disabled');
                     $("body").find('.custom-loading').hide();
                     
                 }else{
                     putErrorsToLabel($this,data.errors);
                     $this.find('button').removeAttr('disabled');
                     $("body").find('.custom-loading').hide();
 
                 }
  
             }



          });

}


function putErrorsToLabel($this,errors) {
  $.each(errors,function(key,value){
    console.log('#'+key+'-error');
     $this.find('#'+key+'-error').text(value);
  });
}









function submit_form_func($this) {
  
    $.ajax({
           type: "POST",
            url:$this.data('action'),
           data: $this.serialize(), // serializes the form's elements.
           success: function(data)
           {
                  if(parseInt(data.status) == 1){
                 
                     notification_msg(data.message,'success');
                     $this.find("button[type='submit']").removeAttr('disabled');
                     $("body").find('.custom-loading').hide();
                       
                     window.location.href = data.url;

                     return true;
                  }else if(parseInt(data.status) == 2){
                     
                     notification_msg(data.message);
                     $this.find('button').removeAttr('disabled');
                     $("body").find('.custom-loading').hide();
                     
                 }else{
                     putErrorsToLabel($this,data.errors);
                     $this.find('button').removeAttr('disabled');
                     $("body").find('.custom-loading').hide();
 
                 }
  
          }
      });
}




//--------------------------------------------------------------------------------------------------------------------------------
// Ajax with CKeditor
//--------------------------------------------------------------------------------------------------------------------------------


function upload_form_file_with_ckeditor($this) {
        var form = $this[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        var percent = $('body').find('.percent');
        var bar = $('.bar');
        var desc = CKEDITOR.instances.subject.getData();
        formData.append('subject', desc);
        
        $.ajax({
           url: $this.data('action'),
           method:"POST",
           data:formData,
           dataType:'JSON',
           contentType: false,
           cache: false,
           processData: false,
           beforeSend: function() {
               $('body').find('.progress').show();
               $('.progress').find('span.sr-only').text('0%');
               $this.find('button').attr('disabled','true');
               $("body").find('.custom-loading').show();

          },
           xhr: function () {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function (evt) {
                if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    $('.progress').find('span.sr-only').text(percentComplete + '%');
                    $('.progress .progress-bar').css('width', percentComplete + '%');
                }
            }, false);
            return xhr;
          },
           success:function(data)
           {
            $('#message').html('');
             
                  if(parseInt(data.status) == 1){
                 
                     form.reset();
                     notification_msg(data.message,'success');
                    // $this.find("button[type='submit']").removeAttr('disabled');
                     $("body").find('.custom-loading').hide();
                       
                     window.location.href = data.url;

                     return true;
                  }else if(parseInt(data.status) == 2){
                     
                     notification_msg(data.message);
                     $this.find('button').removeAttr('disabled');
                     $("body").find('.custom-loading').hide();
                     
                 }else{
                     putErrorsToLabel($this,data.errors);
                     $this.find('button').removeAttr('disabled');
                     $("body").find('.custom-loading').hide();
 
                 }
           

           }

          });
}




















//Checking Image Extension while uploading profile image
var _validFileExtensions = [".jpg", ".jpeg", ".gif", ".png"];

function ValidateSingleInput(oInput, img_id) {
  $(oInput).parent().find('label').css('display', 'none');

  $("label[for='" + oInput.id + "']").css('display', 'none');

   if (oInput.type == "file") {
     var sFileName = oInput.value;

     if (sFileName.length > 0) {
      if (Math.round(oInput.files[0].size / (1024 * 1024)) > 2) { // make it in MB so divide by 1024*1024
        alert('Please select image size less than 2 MB');
        oInput.value = "";
        document.getElementById(img_id).style.display = "none";
        return false;
     }
       var blnValid = false;
       for (var j = 0; j < _validFileExtensions.length; j++) 
       {
         var sCurExtension = _validFileExtensions[j];
         if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) 
         {
           blnValid = true;
           this.readURL(oInput, img_id);
           break;
         }
       }

       if (!blnValid) {
         alert("Sorry!! Allowed image extensions are .jpg, .jpeg, .gif, .png");
         oInput.value = "";
         $(`#${img_id}`).css('display', 'none');
         return false;
       }
     }
   }
return true;
}

function readURL(input, img_id) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $(`#${img_id}`).css('display', 'block');
        $(`#${img_id}`).attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
