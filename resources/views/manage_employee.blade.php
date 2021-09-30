@extends('layout')
@section('page_title','Add Employee')
@section('employee_select','active')

@section('container')
<div class="col-12">
    <div class="overview-wrap">
        <h2 class="title-1">Add Employee</h2>
    </div>
    <div class="overview-wrap m-t-30">
        <a class="btn btn-success" href="{{url('/employee')}}">BACK</a>
    </div>
	<div class="row m-t-30">
	    <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('employee.manage_employee_process')}}" method="post" enctype= multipart/form-data>
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="e_id" class="control-label mb-1">Employee ID</label>
                                    <input id="e_id" name="e_id" type="text" class="form-control" value="{{$e_id}}" required="">
                                    @error('e_id')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Name</label>
                                    <input id="name" name="name" type="text" class="form-control" value="{{$name}}" required="">
                                    @error('name')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email" class="control-label mb-1">Email</label>
                                    <input id="email" name="email" type="text" class="form-control" value="{{$email}}">
                                    @error('email')
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
                                    <label for="address" class="control-label mb-1">Address</label>
                                    <input id="address" name="address" type="text" class="form-control" value="{{$address}}" required="">
                                    @error('address')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="designation" class="control-label mb-1">Designation</label>
                                    <input id="designation" name="designation" type="text" class="form-control" value="{{$designation}}" required="">
                                    @error('designation')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="room" class="control-label mb-1">Room</label>
                                    <input id="room" name="room" type="text" class="form-control" value="{{$room}}">
                                    @error('room')
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