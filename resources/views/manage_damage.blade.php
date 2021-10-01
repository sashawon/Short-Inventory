@extends('layout')
@section('page_title','Update Damage')
@section('damage_select','active')

@section('container')
<div class="col-12">
    <div class="overview-wrap">
        <h2 class="title-1">Update Damage</h2>
    </div>
    <div class="overview-wrap m-t-30">
        <a class="btn btn-success" href="{{url('/damage')}}">BACK</a>
    </div>
	<div class="row m-t-30">
	    <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('damage.manage_damage_process')}}" method="post" enctype= multipart/form-data>
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="status" class="control-label mb-1">Status</label>
                                    <select name="status" id="status" class="form-control" required="">
                                        @if($status=='Assign')
                                            <option selected="" value="Assign">Assign</option>
                                            <option value="Repair">Repair</option>
                                            <option value="Damage">Damage</option>
                                        @elseif($status=='Repair')
                                            <option value="Assign">Assign</option>
                                            <option selected="" value="Repair">Repair</option>
                                            <option value="Damage">Damage</option>
                                        @elseif($status=='Damage')
                                            <option value="Assign">Assign</option>
                                            <option value="Repair">Repair</option>
                                            <option selected="" value="Damage">Damage</option>
                                        @else
                                            <option value="Assign">Assign</option>
                                            <option value="Repair">Repair</option>
                                            <option value="Damage">Damage</option>
                                        @endif
                                    </select>
                                    @error('status')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="employee_id" class="control-label mb-1">Employee ID + Name</label>
                                    <select name="employee_id" id="employee_id" class="form-control" required="">
                                        <option value="">Select</option>
                                        @foreach($employee as $list)
                                            @if($employee_id==$list->id)
                                                <option selected="" value="{{$list->id}}">{{$list->name.' (ID: '.$list->e_id.')'}}</option>
                                            @else
                                                <option value="{{$list->id}}">{{$list->name.' (ID: '.$list->e_id.')'}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('employee_id')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="product_id" class="control-label mb-1">Product Name</label>
                                    <select name="product_id" id="product_id" class="form-control" required="">
                                        <option value="">Select</option>
                                        @foreach($product as $list)
                                            @if($product_id==$list->id)
                                                <option selected="" value="{{$list->id}}">{{$list->name}}</option>
                                            @else
                                                <option value="{{$list->id}}">{{$list->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('product_id')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="mobile" class="control-label mb-1">Mobile</label>
                                    <input id="mobile" name="mobile" type="number" class="form-control" value="{{$mobile}}" required="">
                                    @error('mobile')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="qty" class="control-label mb-1">Quantity</label>
                                    <input id="qty" name="qty" type="text" class="form-control" value="{{$qty}}">
                                    @error('qty')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                Submit
                            </button>
                        </div>
                        <input type="hidden" name="id" value="{{$id}}">
                    </form>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection