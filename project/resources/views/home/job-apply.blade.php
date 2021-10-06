@extends('home.layouts.main-layout')
 
@section('main-content')

  <?php $countries = \App\Models\Country::get(); ?>

          <section class="site-form-layout" style="background-image: url('<?= url('frontend/images/Banner-image.png')?>');">
             <a href="{{$back_link}}" class="back-btn-icon"><i class="fi-br-angle-left"></i></a>

            <div class="container">
              <div class="form-blocks-wrap">
                <div class="forms-head text-center pt-3">
                  <a href="{{route('home')}}" class="logo">
                    <img src="<?= url('frontend/images/logo.png')?>"> 
                  </a>
                </div>
                <div class="form-block">
                  <div class="form-block-inn"> 
                  <div class="sec-heading text-center" data-aos="fade-left" data-aos-duration="1000">
                 <h2>{{$jobs->title}}</h2>
                 <span class="sec-heading-icon" data-aos="zoom-in" data-aos-duration="2000"><i class="icon-review"></i></span>
                 
               </div>
               <div class="heading-eme-block mb-4">
                   <ul class="features_listing">                    
                     <li><h4><span class="ftr-icon"><i class="icon-pin"></i></span> {{$jobs->location}}</h4></li>
                     <li><h4><span class="ftr-icon"><i class="icon-wifi"></i></span> {{_lang($jobs->job_type)}}</h4></li>
                     <li><h4><span class="ftr-icon"><i class="icon-hotel"></i></span> {{_lang($jobs->job_timing)}}</h4></li>
                   </ul>
                 </div>
                 <span class="line-row pb-2"></span> 

               	<form class="mt-4" data-action="{{route('home.job.apply',$job->id)}}" method="POST" id="ApplyJobForm" enctype="multipart/form-data">    
                @csrf          

                  <div class="sec-heading text-center" data-aos="fade-left" data-aos-duration="1000">
                   <h2>{{_lang('Personal Details')}}</h2>
                     <span class="sec-heading-icon" data-aos="zoom-in" data-aos-duration="2000"><i class="icon-review"></i></span>
                  </div>
                 
                  <div class="form-group">
                    <label class="form-label">{{_lang('Full Name')}}</label>
                    <input type="text" name="name" class="form-control" placeholder="{{_lang('Full Name')}}" required="">
                  </div>
                  <div class="form-group">
                    <label class="form-label">{{_lang('Email')}}</label>
                    <input type="text" name="email" class="form-control" placeholder="{{_lang('Email')}}" required="">
                  </div>
                    
                    <div class="form-group">
                      <label class="form-label">{{_lang('Phone Number')}}</label>
                      <div class="input-wrap">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          
                          <span class="input-group-text">
                             <select class="form-control" name="phone_code">
                                @foreach($countries as $cate)
                                  <option value="+{{$cate->phonecode}}">+{{$cate->phonecode}}</option>
                                @endforeach
                                </select>
                          </span>
                        </div>
                        <input type="text" name="phone_number" class="form-control" placeholder="{{_lang('Phone Number')}}">
                      </div>
                      <span class="input-icon"> <i class="fas fa-phone"></i></span>
                    </div>
                   </div>
                   <div class="form-group">
                    <label class="form-label">{{_lang('Gender')}}</label>
                    <ul class="Ethnicity_block">
                    <li><div class="custom-control custom-radio">
                         <input type="radio" id="genderRadio1" name="gender" value="Male" class="custom-control-input" checked="">
                        <label class="custom-control-label" for="genderRadio1">{{_lang('Male')}}</label>
                      </div>
                    </li>
                    <li><div class="custom-control custom-radio">
                         <input type="radio" id="genderRadio2" name="gender" value="Female" class="custom-control-input">
                        <label class="custom-control-label" for="genderRadio2">{{_lang('Female')}}</label>
                      </div>
                    </li>
                    <li><div class="custom-control custom-radio">
                         <input type="radio" id="genderRadio3" name="gender" value="Other" class="custom-control-input">
                        <label class="custom-control-label" for="genderRadio3">{{_lang('Other')}}</label>
                      </div>
                    </li>
                  </ul>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Nationality</label>
                    <select class="form-control">
                      <option>Indian</option>                      
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Address line 1</label>
                    <textarea class="form-control" name="" placeholder="Enter your Address" required></textarea>
                  </div>   
                <div class="form-group">
                    <label class="form-label">Address line 2</label>
                    <textarea class="form-control" name="" placeholder="Enter your Address" required></textarea>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Postal Code</label>
                    <input type="text" name="" class="form-control" placeholder="Enter Postal Code" required>
                  </div>
                
              <div class="form-block">
                <div class="form-block-inn">
                  <div class="common-block-class">
                  <div class="sec-heading text-center" data-aos="fade-left" data-aos-duration="1000">
                   <h2>{{_lang('Qualifications')}}</h2>
                     <span class="sec-heading-icon" data-aos="zoom-in" data-aos-duration="2000"><i class="icon-review"></i></span>
                  </div>
                  <div class="d-f j-c-s-b mb-4">
                 <h2 class="card-inn-heading">{{_lang('Work Experience')}}</h2>
                 <div class="add-occ">
                   <a href="javascript:void(0);" class="add_more_btn AddCompany"><span class="cate_icon"><i class="fas fa-plus"></i></span> <h5>{{_lang('Add more')}}</h5></a>
                  </div>
                </div>
                <div class="row" id="AddCompany">
                  <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-label">{{_lang('Company Name')}}</label>
                    <input type="text" name="company_name[]" class="form-control" placeholder="{{_lang('Company Name')}}" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">{{_lang('Work Summary')}}</label>
                    <textarea class="form-control" name="work_summary[]" placeholder="{{_lang('Summary')}}" required></textarea>
                  </div>
                </div>
                <!-- New field block -->
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-label">Location</label>
                    <textarea class="form-control" name="" placeholder="Enter your Location" required></textarea>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Position</label>
                    <input type="text" name="" class="form-control" placeholder="Position" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Years of experience</label>
                    <input type="number" name="" class="form-control" placeholder="Position" required>
                  </div>
                </div>
                <!-- New field block -->
                </div>
                  
                  <div class="add-more-block">
                    <div class="add-occ my-3">
                   <a href="javascript:void(0);" class="add_more_btn AddCompany"><span class="cate_icon"><i class="fas fa-plus"></i></span> <h5>{{_lang('Add more')}}</h5></a>
                  </div>
                  </div>
                </div>
                  <div class="education_card_block my-4 common-block-class">
                    <div class="d-f j-c-s-b mb-4">
                 <h2 class="card-inn-heading">{{_lang('Education')}}</h2>
                  <div class="add-occ">
                       <a href="javascript:void(0);" class="add_more_btn AddEducation"><span class="cate_icon"><i class="fas fa-plus"></i></span> <h5>{{_lang('Add more')}}</h5></a>
                    </div>  
                </div>
                    
                    <div class="add-more-block row">
                         <div class="col-12" id="AddEducation">
                           <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="form-label">{{_lang('School | Collage')}}</label>
                                  <input type="text" name="education_school[]" class="form-control" required="" placeholder="Ex: Oxford University">
                              </div>
                            </div>
                             <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="form-label">{{_lang('Degree')}}</label>
                                  <input type="text" name="education_degree[]" class="form-control" required="" placeholder="Ex: MCA">
                              </div>
                            </div>
                             <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="form-label">{{_lang('Field of Study')}}</label>
                                  <input type="text" name="education_study_field[]" class="form-control" required="" placeholder="Ex: Computer">
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                  <label class="form-label">{{_lang('Grade')}}</label>
                                  <input type="text" name="education_study_Grade[]" class="form-control" required="" placeholder="Ex: 60%">
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                  <label class="form-label">{{_lang('Start Year')}}</label>
                                  <input type="number" required="" name="education_study_start_year[]" class="form-control" min="2000" max="{{date('Y')}}" placeholder="Ex: 60%">
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                  <label class="form-label">{{_lang('End Year')}}</label>
                                  <input type="number" required="" name="education_study_end_year[]" class="form-control" min="2000" max="{{date('Y')}}" placeholder="Ex: 60%">
                              </div>
                            </div>
                          

                          </div>
                       </div>
                    <div class="add-occ my-3">
                       <a href="javascript:void(0);" class="add_more_btn AddEducation"><span class="cate_icon"><i class="fas fa-plus"></i></span> <h5>{{_lang('Add more')}}</h5></a>
                    </div>                  
                  </div>
                  <div class="common-block-class">
                  <!-- <div class="form-group">
                    <label class="form-label">{{_lang('Exprience Summary')}}</label>
                    <textarea class="form-control" name="exprience_summary" placeholder="Exprience Summary" required></textarea>
                  </div> -->
                  </div>
                   <div class="resume_card_block">
                    <h2 class="card-inn-heading mb-4">{{_lang('Upload Resume / Curriculum Vitae')}}</h2>
                      <div class="form-group">
                        
                          <input type="file" class="form-control" name="resume" id="uploadResume" onchange="ValidateFile(this);" required>
                          <p id="UserUploadedFileName" class="UserUploadedFileName"></p>
                          <!-- {{_lang('Upload Resume')}} -->
                        
                      </div>
                  <!-- <div class="form-group">
                    <label class="form-label">{{_lang('Cover Letter')}}</label>
                    <textarea class="form-control" name="cover_letter" placeholder="Cover Letter" required></textarea>
                  </div> -->
                  </div>
                   
                </div>
              </div>
            </div>
              <div class="form-block mt-0 pt-0">
                <div class="form-block-inn">
                <div class="sec-heading text-center" data-aos="fade-left" data-aos-duration="1000">
                   <h2>{{_lang('Additional Information')}}</h2>
                     <span class="sec-heading-icon" data-aos="zoom-in" data-aos-duration="2000"><i class="icon-review"></i></span>
                  </div> 
                  <div class="my-4 common-block-class">           
                   <div class="form-group">
                   <label class="form-label">Marital Status</label>
                   <ul class="Ethnicity_block">
                    <li><div class="custom-control custom-radio">
                         <input type="radio" id="maritalRadio1" name="gender" value="Male" class="custom-control-input" checked="">
                        <label class="custom-control-label" for="maritalRadio1">Married</label>
                      </div>
                    </li>
                    <li><div class="custom-control custom-radio">
                         <input type="radio" id="maritalRadio2" name="gender" value="Female" class="custom-control-input">
                        <label class="custom-control-label" for="maritalRadio2">Single</label>
                      </div>
                    </li>
                    <li><div class="custom-control custom-radio">
                         <input type="radio" id="maritalRadio3" name="gender" value="Other" class="custom-control-input">
                        <label class="custom-control-label" for="maritalRadio3">Widow</label>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="form-group">
                    <label class="form-label">Notice Period</label>
                    <input type="text" name="" class="form-control" placeholder="Notice Period">
                  </div>
                  <div class="form-group">
                   <label class="form-label">Visa Status</label>
                   <ul class="Ethnicity_block">
                    <li><div class="custom-control custom-radio">
                         <input type="radio" id="visaRadio1" name="gender" value="Male" class="custom-control-input" checked="">
                        <label class="custom-control-label" for="visaRadio1">Citizen</label>
                      </div>
                    </li>
                    <li><div class="custom-control custom-radio">
                         <input type="radio" id="visaRadio2" name="gender" value="Female" class="custom-control-input">
                        <label class="custom-control-label" for="visaRadio2">Expatriate</label>
                      </div>
                    </li>
                    
                  </ul>
                </div>
                   
                   <!-- New field block -->
                  <div class="form-group">
                    <label class="form-label">What language do you speak?</label>
                    <input type="text" name="" class="form-control" placeholder="Enter your language" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Years of experience in language</label>
                    <input type="number" name="" class="form-control" placeholder="Experience in langiage" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">proficiency</label>
                    <select class="form-control">
                      <option>Elementary proficiency</option>
                      <option>Limited Working Proficiency</option>
                      <option>Full working Proficiency</option>
                      <option>Professional working Proficiency</option>
                      <option>Native or Bilingual</option>
                    </select>
                  </div>                  
                  <div class="add-occ">
                       <a href="javascript:void(0);" class="add_more_btn"><span class="cate_icon"><i class="fas fa-plus"></i></span> <h5>Add more</h5></a>
                    </div>
                  </div>
                <!-- New field block -->

                  <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck3" name="terms_condition" required="">
                    <label class="custom-control-label" for="customCheck3">{{_lang('I agree')}} <a href="{{url('/terms-and-conditions')}}" style="text-decoration: underline;">{{_lang('Terms of use')}}</a> & <a href="{{url('/privacy-policy')}}" style="text-decoration: underline;">{{_lang('Privacy Policy')}}</a></label>
                  </div>
                 </div>
                 <div class="btn-wrap">
                   <!-- <a href="javascript:void(0);" class="main-btn white-btn mt-3">Submit</a> -->
                   <input type="submit" class="main-btn white-btn mt-3" id="ApplySubmitBtn" value="{{_lang('Submit')}}">
                 </div>
                </div>
              </div>
              </form>
             </div>
            </div>
            </div>
          </section>
     <!-- HEADER CODE END -->    
     @endsection
 
@section('my-js')
<!-- <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
 -->
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <script src="{{url('adminLte')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script> 
<script type="text/javascript" src="{{url('frontend/js/dev/newcustom.js')}}"></script>
<script type="text/javascript">


function addEducation() {

// var $no = $("body").find('.one-more-item').length();
var $text  ='';
$text +='<hr><div class="row one-more-item">';
$text +='<div class="col-sm-12">';
$text +='<div class="form-group">';
$text +='<label class="form-label">{{_lang('School | Collage')}}</label>';
$text +='<input type="text" name="education_school[]" class="form-control" placeholder="Ex: Oxford University" required>';
$text +='</div>';
$text +='</div>';
$text +='<div class="col-sm-6">';
$text +='<div class="form-group">';
$text +='<label class="form-label">{{_lang('Degree')}}</label>';
$text +='<input type="text" name="education_degree[]" class="form-control" placeholder="Ex: MCA" required>';
$text +='</div>';
$text +='</div>';
$text +='<div class="col-sm-6">';
$text +='<div class="form-group">';
$text +='<label class="form-label">{{_lang('Field of Study?')}}</label>';
$text +='<input type="text" name="education_study_field[]" class="form-control" placeholder="Ex: Computer" required>';
$text +='</div>';
$text +='</div>';
$text +='<div class="col-sm-4">';
$text +='<div class="form-group">';
$text +='<label class="form-label">{{_lang('Grade?')}}</label>';
$text +='<input type="text" name="education_study_Grade[]" class="form-control" placeholder="Ex: 60%" required>';
$text +='</div>';
$text +='</div>';
$text +='<div class="col-sm-4">';
$text +='<div class="form-group">';
$text +='<label class="form-label">{{_lang('Start Year')}}</label>';
$text +='<input type="number" required="" name="education_study_start_year[]" class="form-control" min="2000" max="{{date('Y')}}" placeholder="Start Year">';
$text +='</div>';
$text +='</div>';
$text +='<div class="col-sm-4">';
$text +='<div class="form-group">';
$text +='<label class="form-label">{{_lang('End Year')}}</label>';
$text +='<input type="number" required="" name="education_study_end_year[]" class="form-control" min="2000" max="{{date('Y')}}" placeholder="End Year">';
$text +='</div>';
$text +='</div>';
$text +='<div class="col-sm-4">';
$text +='<div class="link_wrap">';
$text +='<a href="javascript:void(0);" class="normal-link deleteBtn">Delete</a>';
$text +='</div>';
$text +='</div>';

$text +='</div>';
    return $text;
}









function companyInformation() {
 var $text  ='<div class="col-md-12 one-more-item"><hr>';
 $text +='<div class="form-group">';
 $text +='<label class="form-label">Company Name</label>';
 $text +='<input type="text" name="company_name[]" class="form-control" required placeholder="Company">';
 $text +='</div>';
 $text +='<div class="form-group">';
 $text +='<label class="form-label">Work Summsry</label>';
 $text +='<textarea class="form-control" name="work_summary[]" required placeholder="Summary"></textarea>';
 $text +='<label for=""></label>';
 $text +='</div>';
 $text +='<div class="link_wrap">';
 $text +='<a href="javascript:void(0);" class="normal-link deleteBtn">Delete</a>';
 $text +='</div>';
 $text +='</div>';
 return $text;
}



$("body").on('click','.AddEducation',function(e){
  e.preventDefault();
  $("body").find('#AddEducation').append(addEducation());
});


$("body").on('click','.AddCompany',function(e){
  e.preventDefault();
  $("body").find('#AddCompany').append(companyInformation());
});

$("body").on('click','.deleteBtn',function(e){
  e.preventDefault();
  $(this).closest('.one-more-item').remove();
});

// Get File name
$('input[type="file"]').change(function(e){
  if(this.value != ''){        
    var fileName = e.target.files[0].name;
    $('#UserUploadedFileName').html(fileName);
  }
});
// Form Validation
$("body").find("#ApplyJobForm").validate({
 onfocusout: function (valueToBeTested) {
    $(valueToBeTested).valid();
 },
 highlight: function(element) {
   $('element').removeClass("error");
 },
    rules: {
        name: {
            required: true,
            minlength: 2,
            maxlength: 50,
            letterswithspace: true,
        }, 
        email: {
            required: true,
            email: true,
        },
         phone_number: {
            required: true,
            number: true,
            minlength: 10,
            maxlength: 15,
        },
        exprience_summery: {
            required: true,
        },
        company_name: {
            required: true,
        },
        cover_letter: {
            required: true,
        },
         'education_school[]': {
            required: true,
        },
         'education_degree[]': {
            required: true,
        },
         'education_study_field[]': {
            required: true,
        },
         'education_study_Grade[]': {
            required: true,
        },
         'education_study_start_year[]': {
            required: true,
        },
         'education_study_end_year[]': {
            required: true,
        },
        
        race_ethnicity: {
            required: true,
        },
        gender: {
            required: true,
        },
        terms_condition: {
            required: true,
        },
        resume: {
            required: true,
        },
    },
    valueToBeTested: {
           required: true,
    }
});

// $('#ApplySubmitBtn').click(function(){
//     $(this).attr('disabled', true);
//     if($('#ApplyJobForm').valid()){
//         $('#ApplyJobForm').submit();
//     }else{
//         $(this).attr('disabled', false);
//         return false;
//     }   
// });


$("body").on('submit','#ApplyJobForm',function(e){
e.preventDefault();
var $this = $( this );

if($this.valid()){
    console.log($this.serialize());
 
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
             $("body").find('.custom-loading').hide();
                 alert(data.message);
             if(data.status == 1){
                window.location.reload();
             }
           }

          });
}



});
</script>
@endsection