@extends('layout')
@section('page_title','Manage Product')
@section('product_select','active')

@section('container')
<div class="col-12">
    <div class="overview-wrap">
        <h2 class="title-1">Manage Product</h2>
    </div>
    <div class="overview-wrap m-t-30">
        <a class="btn btn-success" href="{{url('/product/manage_product')}}">ADD PRODUCT</a>
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
	                        <th>SKU</th>
	                        <th>Name</th>
	                        <th>Slug</th>
	                        <th>Category</th>
	                        <th>Brand</th>
	                        <th>Qty</th>
	                        <th>Type</th>
	                        <th>Desc</th>
	                        <th>M_Date</th>
	                        <th>Exp_Date</th>
	                        <th>Entry Date</th>
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
	                        <td>{{$list->sku}}</td>
	                        <td>{{$list->name}}</td>
	                        <td>{{$list->slug}}</td>
	                        <td>{{$list->category_name}}</td>
	                        <td>{{$list->brand_name}}</td>
	                        <td>{{$list->qty}}</td>
	                        <td>{{$list->type}}</td>
	                        <td>{{$list->desc}}</td>
	                        <td>{{$list->m_date}}</td>
	                        <td>{{$list->exp_date}}</td>
	                        <td>{{$list->created_at}}</td>
	                        <td>
	                        	@if($list->status==1)
	                        		<a class="btn btn-primary" href="{{url('/product/status/0')}}/{{$list->id}}">Active</a>
	                        	@elseif($list->status==0)
	                        		<a class="btn btn-warning" href="{{url('/product/status/1')}}/{{$list->id}}">Deactive</a>
	                        	@endif
	                        	<a class="btn btn-success" href="{{url('/product/manage_product')}}/{{$list->id}}">Edit</a>
	                        	<a class="btn btn-danger" href="{{url('/product/delete')}}/{{$list->id}}">Delete</a>
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