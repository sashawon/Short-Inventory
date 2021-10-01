@extends('layout')
@section('page_title','Manage Repair')
@section('repair_select','active')

@section('container')
<div class="col-12">
    <div class="overview-wrap">
        <h2 class="title-1">Manage Repair</h2>
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
	                        <th>P_Name</th>
	                        <th>E_ID</th>
	                        <th>E_Name</th>
	                        <th>Mobile</th>
	                        <th>Room</th>
	                        <th>Qty</th>
	                        <th>Status</th>
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
	                        <td>{{$list->product_name}}</td>
	                        <td>{{$list->employee_id}}</td>
	                        <td>{{$list->employee_name}}</td>
	                        <td>{{$list->mobile}}</td>
	                        <td>{{$list->room}}</td>
	                        <td>{{$list->qty}}</td>
	                        <td>{{$list->status}}</td>
	                        <td>
	                        	<a class="btn btn-success" href="{{url('/repair/manage_repair')}}/{{$list->id}}">Edit</a>
	                        	<a class="btn btn-danger" href="{{url('/repair/delete')}}/{{$list->id}}">Delete</a>
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