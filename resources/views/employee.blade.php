@extends('layout')
@section('page_title','Manage Employee')
@section('employee_select','active')

@section('container')
<div class="col-12">
    <div class="overview-wrap">
        <h2 class="title-1">Manage Employee</h2>
    </div>
    <div class="overview-wrap m-t-30">
        <a class="btn btn-success" href="{{url('/employee/manage_employee')}}">ADD EMPLOYEE</a>
    </div>
	<div class="row m-t-30">
	    <div class="col-12">
	    	@if(session()->has('msg'))
	    	<div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
				{{session('msg')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
	    	@endif
            <!-- DATA TABLE-->
	        <div class="table-responsive m-b-40">
	            <table id="table" class="table table-borderless table-data3">
	                <thead>
	                    <tr>
	                        <th>No</th>
	                        <th>E_ID</th>
	                        <th>Name</th>
	                        <th>Email</th>
	                        <th>Mobile</th>
	                        <th>Address</th>
	                        <th>Designation</th>
	                        <th>Room</th>
	                        <th>Action</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@php
	                	$i = 1;
	                	@endphp
	                	@foreach($data as $list)
	                    <tr>
	                        <td>{{$i++}}</td>
	                        <td>{{$list->e_id}}</td>
	                        <td>{{$list->name}}</td>
	                        <td>{{$list->email}}</td>
	                        <td>{{$list->mobile}}</td>
	                        <td>{{$list->address}}</td>
	                        <td>{{$list->designation}}</td>
	                        <td>{{$list->room}}</td>
	                        <td>
	                        	@if($list->status==1)
	                        		<a class="btn btn-primary" href="{{url('/employee/status/0')}}/{{$list->id}}">Active</a>
	                        	@elseif($list->status==0)
	                        		<a class="btn btn-warning" href="{{url('/employee/status/1')}}/{{$list->id}}">Deactive</a>
	                        	@endif
	                        	<a class="btn btn-success" href="{{url('/employee/manage_employee')}}/{{$list->id}}">Edit</a>
	                        	<a class="btn btn-danger" href="{{url('/employee/delete')}}/{{$list->id}}">Delete</a>
	                        </td>
	                    </tr>
	                    @endforeach
	                </tbody>
	            </table>
	        </div>
	        <!-- END DATA TABLE-->
	    </div>
	</div>
</div>
@endsection