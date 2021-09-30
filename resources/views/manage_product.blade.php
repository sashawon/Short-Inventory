@extends('layout')
@section('page_title','Add Product')
@section('product_select','active')

@section('container')

@if($id<0)
    @php
        $image_required = 'required'
    @endphp
@else
    @php
        $image_required = ''
    @endphp
@endif
<div class="col-12">
    <div class="overview-wrap">
        <h2 class="title-1">Add Product</h2>
    </div>
    <div class="overview-wrap m-t-30">
        <a class="btn btn-success" href="{{url('/product')}}">BACK</a>
    </div>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
	<div class="row m-t-30">
	    <div class="col-12">
            @if(session()->has('sku_error'))
            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                {{session('sku_error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            @endif
        </div>
        <div class="col-12">
            <form action="{{route('product.manage_product_process')}}" method="post" enctype= multipart/form-data>
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="control-label mb-1">Name</label>
                            <input id="name" name="name" type="text" class="form-control" value="{{$name}}" required="">
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="sku" class="control-label mb-1">SKU</label>
                                    <input id="sku" name="sku" type="text" class="form-control" value="{{$sku}}" required="">
                                    @error('sku')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="slug" class="control-label mb-1">Slug</label>
                                    <input id="slug" name="slug" type="text" class="form-control" value="{{$slug}}" required="">
                                    @error('slug')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="qty" class="control-label mb-1">Quantity</label>
                                    <input id="qty" name="qty" type="text" class="form-control" value="{{$qty}}" required="">
                                    @error('qty')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="category_id" class="control-label mb-1">Category</label>
                                    <select name="category_id" id="category_id" class="form-control" required="">
                                        <option value="">Select</option>
                                        @foreach($category as $list)
                                            @if($category_id==$list->id)
                                                <option selected="" value="{{$list->id}}">{{$list->category_name}}</option>
                                            @else
                                                <option value="{{$list->id}}">{{$list->category_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="brand_id" class="control-label mb-1">Brand</label>
                                    <select name="brand_id" id="brand_id" class="form-control" required="">
                                        <option value="">Select</option>
                                        @foreach($brands as $list)
                                            @if($brand_id==$list->id)
                                                <option selected="" value="{{$list->id}}">{{$list->brand_name}}</option>
                                            @else
                                                <option value="{{$list->id}}">{{$list->brand_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="type" class="control-label mb-1">Type</label>
                                    <select name="type" id="type" class="form-control" required="">
                                        @if($type=='Fixed')
                                            <option selected="" value="Fixed">Fixed</option>
                                            <option value="Variable">Variable</option>
                                        @elseif($type=='Variable')
                                            <option value="Fixed">Fixed</option>
                                            <option selected="" value="Variable">Variable</option>
                                        @else
                                            <option value="">Select</option>
                                            <option value="Fixed">Fixed</option>
                                            <option value="Variable">Variable</option>
                                        @endif
                                    </select>
                                    @error('type')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desc" class="control-label mb-1">Description</label>
                            <textarea id="desc" name="desc" rows="5" class="form-control" required="">{{$desc}}</textarea>
                            @error('desc')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="m_date" class="control-label mb-1">Manufacturing Date</label>
                                    <input id="m_date" name="m_date" type="date" class="form-control" value="{{$m_date}}">
                                    @error('m_date')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exp_date" class="control-label mb-1">Expired Date</label>
                                    <input id="exp_date" name="exp_date" type="date" class="form-control" value="{{$exp_date}}">
                                    @error('exp_date')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        Submit
                    </button>
                </div>
                <input type="hidden" name="id" value="{{$id}}"/>
            </form>
        </div>
	</div>
</div>
@endsection