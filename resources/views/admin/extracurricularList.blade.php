@extends('master')
@section('content')
@include('admin.layouts.sidebar')
<!--page-content  -->
<div id="page-content">
	@include('admin.layouts.header')
<!--========= Content part Start here =========-->
            <div class="content">

                <div class="x-panel">

                    <div class="panel panel-primary">
                        <div class="clearfix"></div>
                        <div class="panel-heading">List of Game</div>
                        <div class="panel-body">

                            <form>
                                <div class="container panel-content">
                                    <div class="row ">

                                        <div class="table-responsive col-md-12">

                                            <table id="sort2" class=" table table-bordered table-striped  table-hover">

                                                <thead>
                                                    <tr class="bg-info">
                                                        <th>Game Name</th>
                                                        <th>Game Type</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="background:#fff">
                                                    @foreach($extracurricular_list as $extracurricular)

													<tr>
                                                        <td>{{ ucfirst($extracurricular->title) }}</td>
                                                        <td>{{ ucfirst($extracurricular->type) }}</td>
                                                    </tr>

													@endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                        <!--/.table-responsive  -->

                                    </div>
                                    <!--/.row  -->

                                </div>
                                <!--/.container  -->

                            </form>

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
