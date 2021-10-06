@extends('admin.layouts.layout')
@section('content')



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">COUNTRIES</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Country List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
       

<div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Country Listing
                 
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <a href="{{ route('admin.countryAdd') }}" class="btn btn-success btn-sm">
                  <i class="fas fa-plus"></i>
                  
                </a>

                 <button class="btn btn-danger btn-sm btn-all-del" disabled>
                  <i class="fas fa-trash"></i>
                 </button>
                
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                 <div class="col-md-12">
                    <form id="tableFilter" data-action="{{route('admin.category.list')}}">
                      @csrf
                       <table class="table table-striped">
                    <thead>
                        <tr>
                             
                            <th>#</th>
                            <th>Country</th>
                            <th>Phonecode</th>
                            <th>Short Name</th>
                            <th>Status</th>
                            
                            <th width="185">Action</th>
                        </tr>
                    </thead>
                   

                            <tbody>

                                @if(@sizeof($countries))
                                 @foreach($countries as $k => $listingCountries)
                                
                                <tr id="row_{{ $listingCountries->id }}">
                                    <td>{{$k + 1}}</td>

                                    <td>{{ $listingCountries->name }}</td>

                                    <td></td>

                                    <td>{{ $listingCountries->sortname }}</td>

                               <!--      <td>{{ $listingCountries->phonecode }}</td> -->

                                    <td>{!! $listingCountries->status == 0 ? 'In-Active' : 'Active' !!}</td>

                                    <td>

                                        <a href="{{ route('admin.countryEdit', $listingCountries->id) }}" class="btn pink_outline edit_btn"><i class="fa fa-fw fa-edit"></i>Edit 

                                        </a>

                                        <button id="{{ $listingCountries->id }}" class="btn pink_outline removeCountry"><i class="fa fa-fw fa-times-circle"></i>Remove</button>

                                    </td>

                                </tr>

                                @endforeach

                                @endif

                            </tbody>

                        </table>    {{ $countries->links() }}
                     
                    </form>
                   </div>
              </div>
            </div>
          </div>
      </div>
</div>
 <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 
@endsection
@section('javaScript')
 


<script type="text/javascript">

	

$(document).ready(function(){

  	$('.removeCountry').click(function(){

		var id = $(this).attr('id');

		var url = "{{ route('admin.countryDelete') }}";

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



