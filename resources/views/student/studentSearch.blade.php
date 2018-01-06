@extends('student.master')
@section('content')



<!--page-content  -->
<div id="page-content">

	<!--========= Content part Start here =========-->
	<div class="content">
		<!--warning message  -->
		@if (!empty($noid))
		<div class="alert alert-warning">
			<strong>Error!</strong> {{ $noid }}
		</div>
		@endif
		<!--warning message  -->
		<form action="">
			<div class="search-stdn">
				<input type="text" class="form-control inner-search-stdn" placeholder="Enter Student ID..." name="sid">
				<button type="submit" class="btn button-green btn-search-stdn">
					<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
					<span>Search</span>
				</button>
			</div>
			{{ session('test')}}
		</form>
	</div>
	<!--========= Content part End here =========-->
</div>

@endsection