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
                             <li><a class="active" href="{{ route('addfw') }}"> Add New FW </a></li>
                            <li><a href="{{ route('fwlist') }}"> FW List</a></li>
                        </ul>
                    </li>
                    <li class="menu-title"> <!--<span>Pages</span> </li>-->
                    <li class="submenu"> <a href="#"><i class="la la-tablet-alt"></i>
                        <span> Device List </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('devicelist') }}"> Type 1 </a></li>
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
body {
    font-family: 'Lato', sans-serif
}

h1 {
    margin-bottom: 40px
}

label {
    color: #333
}

.btn-send {
    font-weight: 300;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    width: 80%;
    margin-left: 3px
}

.help-block.with-errors {
    color: #ff5050;
    margin-top: 5px
}

.card {
    margin-left: 10px;
    margin-right: 10px
}
</style>

   
    <!-- Main content -->
    <div class="container">] <div class=" text-center mt-5 ">
        <h1>Add New FW</h1>
    </div>
    {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'FWstore', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        <form id="contact-form" role="form">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label for="form_name">Version</label> 
                                            <input id="form_name" type="text" name="version" class="form-control" placeholder="Please enter version  *" required="required" data-error="Firstname is required."> </div>
                                    </div>
                                   <!-- <div class="col-md-6">
                                        <div class="form-group"> <label for="form_lastname">Lastname *</label> <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required."> </div>
                                    </div>-->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label for="form_name">HardWare Code</label> 
                                            <input id="form_name" type="text" name="hardwarecode" class="form-control" placeholder="Please enter hardware code *" required="required" data-error="Firstname is required."> </div>
                                    </div>
                                   <!-- <div class="col-md-6">
                                        <div class="form-group"> <label for="form_lastname">Lastname *</label> <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required."> </div>
                                    </div>-->
                                </div>
                                <div class="row">
                                    <!--<div class="col-md-6">
                                        <div class="form-group"> <label for="form_email">Email *</label> <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required."> </div>
                                    </div>-->
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label for="form_need">Environment</label> 
                                            <select id="form_need" name="env" class="form-control" required="required" data-error="Please specify your need.">
                                                <option value="" selected disabled>--Select Your Environment--</option>
                                                <option>Production</option>
                                                <option>Development</option>
                                            </select> 
                                        </div>
                                    </div>
        
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label for="form_need">Board Type</label> 
                                            <select id="form_need" name="board_type" class="form-control" required="required" data-error="Please specify your need.">
                                                <option value="" selected disabled>--Select Board Type--</option>
                                                <option value="Pro">Pro</option>
                                                <option value="Swap">Swap</option>
                                                <option value="Neo">Neo</option>
                                            </select> </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                             <label for="form_message">Select FW Files</label> 
                                             <input type="file" id="form_message" name="fwfile" class="form-control" placeholder="Select The File" rows="4" required="required" data-error="Please, leave us a message."></input> </div>
                                    </div>
                                    <div class="col-md-12"> <input type="submit" class="btn btn-success btn-send pt-2 btn-block " value="Save"> </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- /.8 -->
        </div> <!-- /.row-->
    </div>
    {{ Form::close() }}
</div>                      
    <!-- Main content -->
@endsection    