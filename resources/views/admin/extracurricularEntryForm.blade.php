@extends('admin.master')
@section('content')
@include('admin.layouts.sidebar')
<!--page-content  -->
<div id="page-content">
	@include('admin.layouts.header')
<!--========= Content part Start here =========-->
<div class="content">
   <!--Info Panel  -->
   <div class="card card-light text-center">
	 <div class="card-body">
		 <label for="">Student ID: <strong>{{ $sid }}</strong></label>
		 <label for=""> , Name: <strong>{{ ucwords($name) }}</strong></label>
		 <label for=""> , Class: <strong>{{ ucwords($class) }}</strong></label>
		 <label for=""> , Year: <strong>{{ ucwords($year) }}</strong></label>
	 </div>
   </div>
   <!--Info Panel  -->

   <div class="x-panel">

	   <div class="panel panel-primary">
		   <div class="clearfix"></div>
		   <div class="panel-heading">Add Place and Reward </div>
		   <div class="panel-body">

			  <form action={{ route('storeExtraEntry') }} method="post">
				  {{ csrf_field() }}
				  <input type="hidden" name="sid" value={{ $sid }}>
				  <input type="hidden" name="class" value="{{ $class  }}">
				  <input type="hidden" name="year" value={{ $year }}>

				   <div class="container panel-content">
					   <div class="row ">

						   <div class="table-responsive col-md-12">
							   <table id="sort2" class=" table table-bordered table-striped  table-hover">

								   @if(!empty($indoor_list) || !empty($outdoor_list) )
								    <!--info alert message  -->
								<div class="alert alert-info text-center">
									<strong>Please Fillout All Field For Place.</strong>
								</div>
								<!--info alert message  -->
								   <thead>
									   <tr class="bg-info">
										   <th class="text-center">Activities Type</th>
										   <th class="text-center">Activities Name</th>
										   <th class="text-center">Place</th>
										   <th class="text-center">Reward</th>
									   </tr>
								   </thead>

								   	<tbody style="background:#fff">
										@if(!empty($indoor_list))
										@foreach ($indoor_list as $name)
									   	<tr>
										   <td class="text-center">Indoor</td>
										   <td class="text-center">{{ ucwords((str_replace("_", " ", $name))) }}</td>
										   <input type="hidden" name="indoor_list[]" value="{{ $name }}">
										   <td class="text-center"><input type="text" class="form-control" name={{ $name . '[]' }} placeholder="Enter your  place name.." required></td>
										   <td class="text-center"><input type="text" class="form-control" name={{ $name . '[]' }} placeholder="Enter your  Reward.."></td>
									   	</tr>
								   		@endforeach
										@endif

										@if(!empty($outdoor_list))
										@foreach ($outdoor_list as $name)
									   	<tr>
										   <td class="text-center">Outdoor</td>
										   <td class="text-center">{{ ucwords((str_replace("_", " ", $name))) }}</td>
										   <input type="hidden" name="outdoor_list[]" value="{{ $name }}">
										   <td class="text-center"><input type="text" class="form-control" name={{ $name . '[]' }} placeholder="Enter your  place name.." required></td>
										   <td class="text-center"><input type="text" class="form-control" name={{ $name . '[]' }} placeholder="Enter your  Reward.."></td>
									   	</tr>
								   		@endforeach
										@endif

								@else
									<div class="alert alert-warning">
					   				 	<strong>No Activities Selected</strong>
					   			 	</div>
								@endif
								   	</tbody>
							   </table>
						   </div>
						   <!--/.table-responsive  -->

					   </div>
					   <!--/.row  -->

					   <!-- Trigger the modal with a button -->
					   <div class="form-group">
					   		<button type="button" class="btn button-green button next-btn" data-toggle="modal" data-target="#myModal">Save<i class="fa fa-floppy-o save-icon" aria-hidden="true"></i></button>
						</div>
					   <!-- modal -->
					   <div class="modal fade " id="myModal" role="dialog">
						   <div class="modal-dialog  ">
							   <!-- Modal content-->
							   <div class="modal-content">
								   <div class="modal-header  bg-primary">
									   <button type="button" class="close" data-dismiss="modal">&times;</button>
									   <h4 class="modal-title">Do you want to Save?</h4>
								   </div>
								   <div class="modal-footer">
									   <button type="submit"  class="btn button-green">Yes</button>
									   <button type="button" class="btn button-brown" data-dismiss="modal">No</button>
								   </div>
							   </div>
							   <!-- Modal content-->

						   </div>
					   </div>
					   <!-- /.modal -->


			   </form>

			   <form class="" action={{ route('selectExtra') }} method="post">
					  {{ csrf_field() }}
					  <div class="form-group">
						  <input type="hidden" name="sid" value={{ $sid }}>
							 <input type="hidden" name="name" value="{{ $name }}">
							 <input type="hidden" name="class" value="{{ $class  }}">
							 <input type="hidden" name="year" value={{ $year }}>
						  <button type="submit" class="btn button button-brown back-btn"><i class="fa fa-backward back-icon" aria-hidden="true"></i>Back</button>
					  </div>
				  </form>
			</div>
			<!--/.container  -->

		   </div>
		   <!--/ .panel-body  -->
	   </div>
	   <!--/.panel  -->
   </div>
   <!--/ .x-panel  -->
</div>
<!--========= Content part End here =========-->

</div>
@endsection
