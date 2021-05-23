@extends('vehicle.layout')
 
@section('content')
<div class="row " style="margin-top: 5rem;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Vehicale For Rent</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('vehicle.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('vehicle.store') }}" method="POST" style="margin-top: 2rem;">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vehicle No:</strong>
                <input type="text" name="vehicle_no" class="form-control" placeholder="Enter Vehicle No: CAC-1260">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vehicle Name:</strong>
                <input type="text" name="vehicle_name" class="form-control" placeholder="Enter Vehicle name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Owner Name:</strong>
                <input type="text" name="owner_name" class="form-control" placeholder="Enter Owner Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Chassis Number:</strong>
                <input type="text" name="chassis_number" class="form-control" placeholder="Enter Chassis Number">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telephone Number:</strong>
                <input type="text" name="telephone_number" class="form-control" placeholder="Enter Telephone Number">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vehicle Type:</strong>
                <select name="vehicle_type" class="form-control" style="width:250px">
                    <option value="">--- Select Vehicle Type ---</option>
                    <option value="CAR">Car</option>
                    <option value="VAN">Van</option>
                    <option value="BUS">Bus</option>
                    <option value="SUV">SUV</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Rate Per km(Rs):</strong>
                <input type="text" name="rent_per_km" class="form-control" placeholder="Enter Rate Per km">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection