@extends("admin.layouts.layout")
@section("content")

    <div class="main_content dashboard_content">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard_heading">
                        <div class="dashboard_title">
                            <div class="dashboard_title user_single_anchor">
                                <a class="active" href="{{route('admin.settings')}}"><i class="fa fa-angle-left" aria-hidden="true"></i>Add Service</a>
                            </div>
                        </div>
                        <div class="dashboard_title_btn user_dashboard_title_btn">
                            <a href="{{ route('admin.serviceListing') }}" type="button" class="btn add_new_btn">View</a>
                        </div>
                    </div>
                </div>
            </div>
         










            
            <form class="row"  method="POST" action="{{ route('admin.serviceEdit', $service->id) }}" 

                    enctype="multipart/form-data" id="editServiceForm" 

                    name="editServiceForm" 

                    class="needs-validation">
                <div class="col-lg-8">
                    <div class="admin_fonm_outer">


                  

                    @csrf

                        <div class="box-body">

                           <div class="form-group">

                                <label for="name">Service Name</label>

                                <input type="text" value="{{ $service->name }}" name="name" class="form-control" id="name" placeholder="Enter Service Name" required>

                            </div>



                            <div class="form-group">

                                <label for="name">Status</label>

                                <select class="form-control" name="status">

                                    <option value="1" {{ $service->status == '1' ? 'selected=selected' : '' }}>Active</option>

                                    <option value="0" {{ $service->status == '0' ? 'selected=selected' : '' }}>Inactive</option>

                                </select>

                            </div>
                        </div>



                        <div class="box-footer">
                               <button id="countrySubmitButton" type="submit" class="btn btn_pink">Add Service</button>
                        </div>

                   
                    </div>
                </div>
            </form>
        
            </div>



<!-- Right side column. Contains the navbar and content of the page -->

     


@endsection

 