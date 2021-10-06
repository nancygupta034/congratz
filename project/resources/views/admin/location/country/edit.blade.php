@extends("admin.layouts.layout")
@section("content")

    <div class="main_content dashboard_content">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard_heading">
                        <div class="dashboard_title">
                            <div class="dashboard_title user_single_anchor">
                                <a class="active" href="{{route('admin.settings')}}"><i class="fa fa-angle-left" aria-hidden="true"></i>Edit Country</a>
                            </div>
                        </div>
                        <div class="dashboard_title_btn user_dashboard_title_btn">
                            <a href="{{ route('admin.countryListing') }}" type="button" class="btn add_new_btn">View</a>
                        </div>
                    </div>
                </div>
            </div>
         










            
            <form class="row"  method="POST" action="{{ route('admin.countryEdit', $country->id) }}"  

                    enctype="multipart/form-data" id="countryForm" 

                    name="countryForm" 

                    class="needs-validation">
                <div class="col-lg-8">
                    <div class="admin_fonm_outer">


                  

                    @csrf

                        <div class="box-body">

                                       <div class="form-group">

                                <label for="name">Country Name</label>

                                <input type="text" value="{{ $country->name }}" name="name" class="form-control" id="name" placeholder="Enter Country Name" required>

                            </div>

                            <div class="form-group">

                                <label for="name">Short Name</label>

                                <input type="text" value="{{$country->sortname}}" name="sortname" class="form-control" id="sortname" placeholder="Enter Country Short Name" required>

                            </div>

                            <div class="form-group">

                                <label for="name">Phone Code</label>

                                <input type="text" value="{{$country->phonecode}}" name="phonecode" class="form-control" id="phonecode" placeholder="Enter Phone Code" required>

                            </div>
                             <div class="form-group">

                                <label for="name">Country Flag Image</label>

                                <input type="file" value="" name="image" class="form-control" {{empty($country->image) ? 'required' : ''}} >

                                @if(!empty($country->image))
                                  <img src="{{url($country->image)}}">
                                @endif

                            </div>
 
 
                            <div class="form-group">

                                <label for="name">Status</label>

                                <select class="form-control" name="status">

                                    <option value="1" {{ $country->status == '1' ? 'selected=selected' : '' }}>Active</option>

                                    <option value="0" {{ $country->status == '0' ? 'selected=selected' : '' }}>Inactive</option>

                                </select>

                            </div>
                        </div>



                        <div class="box-footer">
                               <button id="countrySubmitButton" type="submit" class="btn btn_pink">Add Country</button>
                        </div>

                   
                    </div>
                </div>
            </form>
        
            </div>



<!-- Right side column. Contains the navbar and content of the page -->

     


@endsection
 