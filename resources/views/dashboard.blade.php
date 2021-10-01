@extends('layout')
@section('page_title','DashBoard')
@section('dashboard_select','active')

@section('container')
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-1">DashBoard</h2>
    </div>
	<div class="row m-t-30">
	    <div class="col-md-12">
	        <div class="row">
                <div class="col-md-6 col-lg-3">
                    <a href="" style="width: 100%;">
                    	<div class="statistic__item">
	                        <h2 class="number">{{$category}}</h2>
	                        <span class="desc">Total Category</span>
	                    </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="" style="width: 100%;">
                    	<div class="statistic__item">
	                        <h2 class="number">{{$brand}}</h2>
	                        <span class="desc">Total Brand</span>
	                    </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="" style="width: 100%;">
                    	<div class="statistic__item">
	                        <h2 class="number">{{$product}}</h2>
	                        <span class="desc">Total Product</span>
	                    </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="" style="width: 100%;">
                    	<div class="statistic__item">
	                        <h2 class="number">{{$employee}}</h2>
	                        <span class="desc">Total Employee</span>
	                    </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="" style="width: 100%;">
                    	<div class="statistic__item">
	                        <h2 class="number">{{$assign}}</h2>
	                        <span class="desc">Total Assign</span>
	                    </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="" style="width: 100%;">
                    	<div class="statistic__item">
	                        <h2 class="number">{{$repair}}</h2>
	                        <span class="desc">Total Repair</span>
	                    </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="" style="width: 100%;">
                    	<div class="statistic__item">
	                        <h2 class="number">{{$damage}}</h2>
	                        <span class="desc">Total Damage</span>
	                    </div>
                    </a>
                </div>
            </div>
	    </div>
	</div>
</div>
@endsection