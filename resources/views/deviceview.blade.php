@extends('layouts.master')
@section('content')

	<!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <!--<span>Main</span>-->
                    </li>
                    <li class="submenu">
                        <a href="#" class="noti-dot">
                            <i class="la la-dashboard"></i>
                            <span> Dashboard</span> <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a  href="{{ route('home') }}">Admin Dashboard</a></li>
                        </ul>
                    </li>
                   
                    
                    <li class="menu-title"> <!--<span>Pages</span> </li>-->
                    <li class="submenu"> <a href="#"><i class="la la-dna"></i>
                        <span> FW Update </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                             <li><a  href="{{ route('addfw') }}"> Add New FW </a></li>
                            <li><a class="active" href="#"> FW List</a></li>
                        </ul>
                    </li>
                    <li class="menu-title"> <!--<span>Pages</span> </li>-->
                    <li class="submenu"> <a href="#"><i class="la la-tablet-alt"></i>
                        <span> Device List </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="training.html"> Type 1 </a></li>
                            <li><a href="trainers.html"> Type 2</a></li>
                            <li><a href="training-type.html"> Type 3 </a></li>
                        </ul>
                    </li>
                    <li class="menu-title"> <!--<span>Pages</span> </li>-->
                    <li class="submenu"> <a href="#"><i class="la la-user"></i>
                        <span> Profile </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="training.html"> User Profile</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
	<!-- /Sidebar -->

<style>

table { 
  width: 100%; 
  border-collapse: collapse; 
}
/* Zebra striping */
tr:nth-of-type(odd) { 
  background: #eee; 
}
th { 
  background: #333; 
  color: white; 
  font-weight: bold; 
}
td, th { 
  padding: 6px; 
  border: 1px solid #ccc; 
  text-align: left; 
}
</style>

   
    <!-- Main content -->
    <div class="container">] <div class=" text-center mt-5 ">
    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="row">
                                    <div class="col-md-6">
    <table>
	<thead>
	<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Job Title</th>
        <th>Last Name</th>
		<th>Job Title</th>
	</tr>
	</thead>
</div>
</div>

	<tbody>
    <div class="row">
 <div class="col-md-6">
	<tr>
		<td>James</td>
		<td>Matman</td>
		<td>Chief Sandwich Eater</td>
        <td>Matman</td>
		<td>Chief Sandwich Eater</td>
	</tr>
    </div>
</div>
<div class="row">
 <div class="col-md-6">
	<tr>
		<td>The</td>
		<td>Tick</td>
		<td>Crimefighter Sorta</td>
        <td>Tick</td>
		<td>Crimefighter Sorta</td>
	</tr>
    </div>
</div>
	</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>

    <!-- Main content -->
@endsection    