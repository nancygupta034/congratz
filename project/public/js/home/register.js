var $emailTseturl = $("body").find('#authCheckFields').val();
$('#registerForm').validate({
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
    "about": {
        required: true
    },
    "address": {
        required: true
    }, "country": {
        required: true
    },
     "state_name": {
        required: true
    },
     "city_name": {
        required: true
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
    }
});