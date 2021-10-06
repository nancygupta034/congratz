

@if($type == 1)
 
  <div class="main_content dashboard_content">
      <div class="row">
        <div class="col-md-12">
          <div class="dashboard_heading">
            <div class="dashboard_title">
              <h2>My Bank detail</h2>
            </div>
       
          </div>
        </div>
     </div>
     <div class="row">
     <div class="col-lg-12">
          <div class="setting_fields My-custom-event-form">



<form class="row" method="post" id="upload_form" enctype="multipart/form-data">
     {{ csrf_field() }}
<div class="col-md-12">
    {{textbox($errors,'First name','first_name',$bank->first_name)}}
 
    {{textbox($errors,'Last name','last_name',$bank->last_name)}}
 
     {{textbox($errors,'Account Number','account_number',$bank->account_number)}}
 
     {{textbox($errors,'IFSC Code','ifsc_code',$bank->ifsc_code)}}


 <div class="form-group"><label></label><button class="btn btn-primary">Update</button></div>
 </div>

 
       
</form>
</div>
</div>
</div>
</div>

@else

  <div class="main_content dashboard_content">
      <div class="row">
        <div class="col-md-12">
          <div class="dashboard_heading">
            <div class="dashboard_title">
              <h2>Products</h2>
              
            </div>
            <div class="dashboard_title_btn">
              <a href="{{url($link)}}" type="button" class="btn add_new_btn">Add</a>
               
            </div>
          </div>
        </div>
      </div>
      
      <div class="table-responsive table_common">
         
        <table class="table">
          <tr>
            <th style="color:#fff;border-color: transparent;width: 180px;">Name</th>
            <td style="text-align: left;">{{$bank->first_name}} {{$bank->last_name}}</td>
          </tr>
          <tr>
            <th style="color:#fff;border-color: transparent;width: 180px;">Account Number</th>
            <td style="text-align: left;">{{$bank->account_number}}</td>
          </tr>
          <tr>
            <th style="color:#fff;border-color: transparent;width: 180px;">IFSC Code</th>
            <td style="text-align: left;">{{$bank->ifsc_code}}</td>
          </tr> 
        </table>
    </div>
</div>


@endif