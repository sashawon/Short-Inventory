@extends('layout')
@section('page_title','Manage Expense')
@section('expense_select','active')

@section('container')
<div class="col-12">
    <div class="overview-wrap">
        <h2 class="title-1">Manage Expense</h2>
    </div>
    <div class="overview-wrap m-t-30">
        <a class="btn btn-success" href="{{url('/expense/manage_expense')}}">ADD EXPENSE</a>
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
	            <table class="table table-borderless table-data3">
	                <thead>
	                    <tr>
	                        <th>No</th>
	                        <th>P_Name</th>
	                        <th>E_ID</th>
	                        <th>E_Name</th>
	                        <th>Mobile</th>
	                        <th>Room</th>
	                        <th>Qty</th>
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
	                        <td>
	                        	<a class="btn btn-success" href="{{url('/expense/manage_expense')}}/{{$list->id}}">Edit</a>
	                        	<a class="btn btn-danger" href="{{url('/expense/delete')}}/{{$list->id}}">Delete</a>
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