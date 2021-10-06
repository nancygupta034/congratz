@extends("admin.layouts.layout")
@section("content")


<div class="main_content dashboard_content">
     <div class="row">
                <div class="col-md-12">
                    <div class="dashboard_heading">
                        <div class="dashboard_title user_single_anchor">
                            <h2>Cities Listing</h2>
                        </div>
                        <div class="dashboard_title_btn user_dashboard_title_btn">
                            <a href="{{ route('admin.cityAdd') }}" type="button" class="btn add_new_btn">Add New</a>
                            <a class="export_icon" href="#"><img src="../assets/images/ic_export.svg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
				<div class="col-md-12 d-flex justify-content-between button_tab_wrapper">
                    <ul class="button_tab_outer">
                        <li><a class="btn tab_btn" href="{{route('admin.countryListing')}}">Countries</a></li>
                        <li><a class="btn tab_btn" href="{{route('admin.stateListing')}}">States</a></li>
                        <li><a class="btn tab_btn active" href="{{route('admin.cityListing')}}">Cities</a></li>
                    </ul>
                    <!--div class=	"user_search">
                        <span class="fa fa-search user_seacrh_icon"></span>
                        <input type="text" class="form-control" placeholder="Search by escorts name...">
                    </div-->
                </div>
                <!--div class="col-md-12">
                    <div class="dashboard_heading">
                        <div class="dashboard_title">
                            <a href="{{route('admin.countryListing')}}">Countries</a>
                            <a href="{{route('admin.stateListing')}}">States</a>
                            <a class="active" href="{{route('admin.cityListing')}}">Cities</a>
                        </div>
                        <div class="dashboard_title_btn">
                            <a class="export_icon" href="#"><img src="../assets/images/ic_export.svg" alt=""></a>
                        </div>
                    </div>
                </div-->
            </div>
 <section class="content-header" id="notificationDiv">

        @include('partials.admin.alert-messages')

    </section>
           
            
            <div class="table-responsive table_common">
                <table class="table table-striped">
                    <thead>
                        <tr>
                             
                            <th>#</th>
                            <th>Name</th>
                            <th>State Name</th>
                            <th>Country</th>
                           
                            <th width="185">Action</th>
                        </tr>
                    </thead>
                   

                            <tbody>

                            
                                @if(@sizeof($cities)) @foreach($cities as $k => $listingCities)

                                <tr id="row_{{ $listingCities->id }}">
                                    <td>{{$k + 1}}</td>
                                    <td>{{ $listingCities->name }}</td>

                                    <td>{{ $listingCities->state->name }}</td>

                                    <td>{{ $listingCities->state->country->name }}</td>

                                    <td>

                                        <a href="{{ route('admin.cityEdit', $listingCities->id) }}">

                                            <button class="btn pink_outline edit_btn"><i class="fa fa-fw fa-edit"></i>Edit</button>

                                        </a>

                                        <button id="{{ $listingCities->id }}" class="btn pink_outline removeCity"><i class="fa fa-fw fa-times-circle"></i>Remove</button>

                                    </td>

                                </tr>

                                @endforeach

                                @endif

                            </tbody>

                        </table>    {{ $cities->links() }}
            </div>
</div>
 


@endsection

 


@section('custom_scripts')



<script type="text/javascript">

    

$(document).ready(function(){

    $('.removeCity').click(function(){

        var id = $(this).attr('id');

        var url = "{{ route('admin.cityDelete') }}";

        deleteFunctionAjax(url, id);

    });

});



function deleteFunctionAjax(url,id){

    if (confirm('Are you sure you want to delete this record?')) {

        var data = { 'id': id };

        

        $.ajax({

           headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

           url: url,

           type: "get",

           dataType: "JSON",

           data: data,

           success: function(res){ 

                var message = '<div class="alert alert-success"><strong>Success!</strong>'+res.success+'</div>';

                $('#notificationDiv').css('dispaly','block').html(message);

                $('#row_'+id).remove();



                setTimeout(function() {

                    $("#notificationDiv").fadeTo(500, 0).slideUp(500, function(){

                    $(this).html(""); 

                    });

                }, 4000);

            },

            error: function(err) { 

                var message = '<div class="alert alert-error"><strong>Error!</strong>'+res.error+'</div>';

                $('#notificationDiv').css('dispaly','block').html(message);

                $('#row_'+id).remove();



                setTimeout(function() {

                    $("#notificationDiv").fadeTo(500, 0).slideUp(500, function(){

                    $(this).html(); 

                    });

                }, 4000);

            }

        });

    }

}

</script>



@endsection 



