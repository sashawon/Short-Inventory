@extends('layout')
@section('page_title','Manage Category')
@section('category_select','active')

@section('container')
<div class="col-12">
    <div class="overview-wrap">
        <h2 class="title-1">Manage Category</h2>
    </div>
    <div class="overview-wrap m-t-30">
        <a class="btn btn-success" href="{{url('/category/manage_category')}}">ADD CATEGORY</a>
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
	                        <th>ID</th>
	                        <th>Category Name</th>
	                        <th>Category Slug</th>
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
	                        <td>{{$list->category_name}}</td>
	                        <td>{{$list->category_slug}}</td>
	                        <td>
	                        	@if($list->status==1)
	                        		<a class="btn btn-primary" href="{{url('/category/status/0')}}/{{$list->id}}">Active</a>
	                        	@elseif($list->status==0)
	                        		<a class="btn btn-warning" href="{{url('/category/status/1')}}/{{$list->id}}">Deactive</a>
	                        	@endif
	                        	<a class="btn btn-success" href="{{url('/category/manage_category')}}/{{$list->id}}">Edit</a>
	                        	<a class="btn btn-danger" href="{{url('/category/delete')}}/{{$list->id}}">Delete</a>
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