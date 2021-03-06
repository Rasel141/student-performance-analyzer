@extends('student.master')
@section('content')
<!--page-content  -->
<div id="page-content" class="class">
	@include('student.layouts.header')
<!--========= Content part Start here =========-->
            <div class="content">
                @if (!empty($all_subject_mark_list))
                <div class="x-panel">

                    <div class="panel panel-primary">
                        <div class="clearfix"></div>
                        <div class="panel-heading">Class : {{ $class }} , Year : @if (!empty($year)) {{ $year[0] }} @endif </div>
                        <div class="panel-body">

                            <form>
                                <div class="container panel-content">
                                    <div class="row ">

                                        <div class="table-responsive col-md-12">

                                            <table id="sort2" class=" table table-bordered table-striped  table-hover">

                                                <thead>
                                                    <tr class="bg-info">
                                                        <th class="text-center">No. </th>
                                                        <th class="text-center">Subject Name</th>
                                                        <th class="text-center">Semester Slot</th>
                                                        <th class="text-center">Semester 1</th>
                                                        <th class="text-center">Semester 2</th>
                                                        <th class="text-center">Semester 3</th>
                                                        <th class="text-center">Average</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="background:#fff">
                                                    @php
                                                        $subject_marks = [];
                                                        $no = 1;
                                                    @endphp
                                                    @foreach($all_subject_mark_list as $key => $value)
                                                       <tr>

                                                        <td class="text-center">{{ $no++ }}</td>
                                                        <td class="text-center">{{ ucwords(str_replace("_", " ", $key)) }}</td>

                                                        @foreach($value as $subject)
                                                            <td class="text-center">{{ $subject->sem_slot }}</td>
                                                            <td class="text-center">{{ $subject->sem_1 }}</td>
                                                            <td class="text-center">{{ $subject->sem_2 }}</td>
                                                            @if($subject->sem_slot === 2)
                                                            <td class="text-center"></td>
                                                            @else
                                                            <td class="text-center">{{ $subject->sem_3 }}</td>
                                                            @endif
                                                            <td class="text-center">{{ $subject->avg_mark }}</td>
                                                            @php
                                                                $subject_marks[$key] = $subject->avg_mark;
                                                            @endphp
                                                        @endforeach

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

                        <!-- Chart Start-->
        <div id="fullscreen">
            <div class="x-panel">
                <!--full-Screen Button start -->
                <div class="fullscreen">
                    <a href="#" class="requestfullscreen">
                        <span class="glyphicon glyphicon-fullscreen"></span>
                    </a>
                    <a href="#" class="exitfullscreen" style="display: none">
                        <span class="glyphicon glyphicon-resize-small"></span>
                    </a>
                </div>
                <!--full-Screen Button end -->
                <div class="panel panel-primary">
                    <div class="panel-heading">Graph</div>
                    <div class="panel-body">

                        <div id="chart">
                            <ul id="numbers">
                                <li>
                                    <span>100%</span>
                                </li>
                                <li>
                                    <span>90%</span>
                                </li>
                                <li>
                                    <span>80%</span>
                                </li>
                                <li>
                                    <span>70%</span>
                                </li>
                                <li>
                                    <span>60%</span>
                                </li>
                                <li>
                                    <span>50%</span>
                                </li>
                                <li>
                                    <span>40%</span>
                                </li>
                                <li>
                                    <span>30%</span>
                                </li>
                                <li>
                                    <span>20%</span>
                                </li>
                                <li>
                                    <span>10%</span>
                                </li>
                                <li>
                                    <span>0%</span>
                                </li>
                            </ul>

                            <ul id="bars">
                                 @foreach($subject_marks as $subject=>$avg_mark)
                                    <li>
                                        <div data-percentage="{{ $avg_mark }}" class="bar"><h4>{{ $avg_mark }}%</h4></div>
                                        <span>{{ ucwords(str_replace("_", " ", $subject)) }}</span>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                    </div>
                    <!--/ .panel-body  -->
                </div>
                <!--/.panel  -->
            </div>
            <!--/ .x-panel  -->
        </div>
        <!--/ #fullscreen  -->
        <!-- Chart End -->
        @else
            <div class="alert alert-info">
            <strong> Class {{ $class }} is not taken yet </strong>.
            </div>
        @endif
        </div>
            <!--========= Content part End here =========-->

          </div>
          @endsection
