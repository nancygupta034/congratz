
jQuery.validator.addMethod("alphanumeric", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
},"This field is not valid.");

$.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Letters only please.");

jQuery.validator.addMethod("letterswithspace", function(value, element) {
    return this.optional(element) || /^[a-z][a-z\s]*$/i.test(value);
}, "Letters only please.");

// Custom Email function
$.validator.addMethod("customemail", 
    function(value, element) {
         return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
        
    },'Please enter a valid email.');

// Custom white space not accepted 
$.validator.addMethod("noSpace", function (value, element) {
return value == '' || value.trim().length != 0;
}, "This Field is required");

// Check Strong password
$.validator.addMethod("checkstrongpassword",function(value, element) {    
  var strength = 1;
  var arr = [/.{5,}/, /[a-z]+/, /[0-9]+/, /[A-Z]+/];
  jQuery.map(arr, function(regexp) {
    if(value.match(regexp))
     strength++;
  });
  if(strength>=5){
    return true;
  }
    return false;
},'Password must contain 1 Capital letter, 1 Small letter, 1 Special Character and 1 Numeric Value.'); 


//Checking File Extension while uploading resume
var _validFileExtensions = [".doc",".docx",".pdf"];

function ValidateFile(oInput) { 
  $('#UserUploadedFileName').html('');
  $(oInput).parent().find('label').css('display', 'none');

  $("label[for='" + oInput.id + "']").css('display', 'none');

   if (oInput.type == "file") {
     var sFileName = oInput.value;

     if (sFileName.length > 0) {
       var blnValid = false;
       for (var j = 0; j < _validFileExtensions.length; j++) 
       {
         var sCurExtension = _validFileExtensions[j];
         if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) 
         {
           blnValid = true;
           break;
         }
       }

       if (!blnValid) {
         alert("Sorry!! Allowed file extension only should be .doc, .docx or .pdf");
         oInput.value = "";
         return false;
       }
     }
   }
return true;
}


// Add method to check all length value are required and check maxlength
$.validator.addMethod("companyInfoRequired", function (value, element) {
    var flag = true;             
   $("[name^=company_name]").each(function (i, j) {  
     $(this).parent().find('#company_name_'+i+'-error').remove();
      if ($.trim($(this).val()) == '') {
         flag = false;
         var counter= i + 1;
      $(this).parent().append('<label id="company_name_'+i+'-error" class="error">This field is required.</label>');
     }
  });  
  return flag; 
}, "");


   





