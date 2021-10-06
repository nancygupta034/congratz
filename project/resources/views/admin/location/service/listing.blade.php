@extends("admin.layouts.layout")
@section("content")


<div class="main_content dashboard_content">
     <div class="row">
                <div class="col-md-12">
                    <div class="dashboard_heading">
                        <div class="dashboard_title user_single_anchor">
                            <h2>Services Listing</h2>
                        </div>
                        <div class="dashboard_title_btn user_dashboard_title_btn">
                            <a href="{{ route('admin.serviceAdd') }}" type="button" class="btn add_new_btn">Add New</a>
                            <a class="export_icon" href="#"><img src="../assets/images/ic_export.svg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
          
 <section class="content-header" id="notificationDiv">

        @include('partials.admin.alert-messages')

    </section>
    <div class="main_content dashboard_content">
           
            
            <div class="table-responsive table_common">
                <table class="table table-striped">
                    <thead>
                        <tr>
                             
                            <th>#</th>
                            <th class="left_align">Service</th>
                             
                            <th class="left_align">Status</th>
                           
                            <th width="185">Action</th>
                        </tr>
                    </thead>
                   

                            <tbody>


                                 @if(@sizeof($services)) @foreach($services as $k => $listingServices)

                                <tr id="row_{{ $listingServices->id }}">
                                     <td>{{$k + 1}}</td>
                                    <td class="left_align">{{ $listingServices->name }}</td>

                                    <td class="left_align">{!! $listingServices->status == 0 ? '<img style="height: 30px; width: 30px;" src="/public/admin/images/inactive.png">' : '<img style="height: 30px; width: 30px;" src="/public/admin/images/active.png">' !!}</td>



                                    <td class="left_align">

                                        <a href="{{ route('admin.serviceEdit', $listingServices->id) }}">

                                            <button class="btn btn-success"><i class="fa fa-fw fa-edit"></i>Edit</button>

                                        </a>

                                        <button id="{{ $listingServices->id }}" class="btn btn-danger removeService"><i class="fa fa-fw fa-times-circle"></i>Remove</button>

                                    </td>

                                </tr>

                                @endforeach

                                @endif


                             

                            </tbody>

                        </table>    {{ $services->links() }}
            </div>
        </div>
</div>
 


@endsection


 

@section('custom_scripts')



<script type="text/javascript">

    

$(document).ready(function(){

    $('.removeService').click(function(){

        var id = $(this).attr('id');

        var url = "{{ route('admin.serviceDelete') }}";

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



