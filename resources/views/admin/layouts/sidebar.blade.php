@section('sidebar')
         <!--========= Sidebar part start here =========-->
         <section class="sidebar" id="sidebar">
             <!--logo  -->
            <!-- <div class="logo">
                <a href="index.html"><img src="assets/resources/img/logo.png" alt="logo"></a>
            </div> -->
            <a href="{{ route('adminHome') }}">
                <div class="logo">
                    <div class="logo-short-form">
                        S
                        <span>P</span> A
                    </div>
                    <div class="logo-full-form">
                        <p>Student Performance Analyzer</p>
                    </div>
                </div>
            </a>
            <!--/logo  -->

             <ul id="accordion" class="accordion">
                 <li>
                     <div class="link"><i class="fa fa-database"></i>Student Information<i class="fa fa-chevron-down"></i></div>
                     <ul class="submenu">
                         <li><a href={{ route('studentInfoIdGenerator') }}>New</a></li>
                         <li><a href={{ route('studentSearch') }}>Verify</a></li>
                         <li><a href={{ route("studentNameList") }}>Search</a></li>
                     </ul>
                 </li>
                 <li>
                     <div class="link"><i class="fa fa-list-alt"></i>Student Performance Entry<i class="fa fa-chevron-down"></i></div>
                     <ul class="submenu">
                         <li><a href={{ route('checkStudentIdMark') }}>Marks</a></li>
                         <li><a href={{ route('checkStudentIdExtra') }}>Extra Curricular</a></li>
                     </ul>
                 </li>
                 <li>
                     <div class="link"><i class="fa fa-book"></i>Subject<i class="fa fa-chevron-down"></i></div>
                     <ul class="submenu">
                         <li><a href={{ route('addSubject') }}>New </a></li>
                         <li><a href={{ route('subjectShow') }}>List</a></li>
                     </ul>
                 </li>
                 <li>
                     <div class="link"><i class="fa fa-th-large"></i>Extra Curricular Activities<i class="fa fa-chevron-down"></i></div>
                     <ul class="submenu">
                         <li><a href={{ route('addExtracurricular') }}>New</a></li>
                         <li><a href={{ route('extracurricularShow') }}>List</a></li>
                     </ul>
                 </li>

                 <li>
                     <div class="link"><i class="fa fa-filter"></i>Student Filter<i class="fa fa-chevron-down"></i></div>
                     <ul class="submenu">
                         <li><a href={{ route('selectOption')}}>Advanced Filter</a></li>
                     </ul>
                 </li>

             </ul>
             <!-- /.accordion  -->
         </section>
         <!--========= Sidebar part End here =========-->
@show
