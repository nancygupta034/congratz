@extends("admin.layouts.layout")
@section("content")

    <div class="main_content dashboard_content">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard_heading">
                        <div class="dashboard_title">
                            <div class="dashboard_title user_single_anchor">
                                <a class="active" href="{{route('admin.settings')}}"><i class="fa fa-angle-left" aria-hidden="true"></i>Add State</a>
                            </div>
                        </div>
                        <div class="dashboard_title_btn user_dashboard_title_btn">
                            <a href="{{ route('admin.stateListing') }}" type="button" class="btn add_new_btn">View</a>
                        </div>
                    </div>
                </div>
            </div>
         










            
            <form class="row"  method="POST" action="{{ route('admin.stateAdd') }}" 

                    enctype="multipart/form-data" id="stateForm" 

                    name="countryForm" 

                    class="needs-validation">
                <div class="col-lg-8">
                    <div class="admin_fonm_outer">


                  

                    @csrf

                        <div class="box-body">

                           <div class="form-group">

                                <label for="name">Country Name</label>

                                <select class="form-control" name="country_id" required>

                                    @if(@sizeof($countries)) @foreach($countries as $listingCountries)

                                    <option value="{{ $listingCountries->id }}">{{ $listingCountries->name }}</option>

                                    @endforeach

                                    @endif

                                </select>

                            </div>

                            <div class="form-group">

                                <label for="name">State Name</label>

                                <input type="text" value="" name="name" class="form-control" id="name" placeholder="Enter State Name" required>

                            </div>

                        </div>



                        <div class="box-footer">
                               <button id="countrySubmitButton" type="submit" class="btn btn_pink">Add State</button>
                        </div>

                   
                    </div>
                </div>
            </form>
        
            </div>



<!-- Right side column. Contains the navbar and content of the page -->

     


@endsection

 