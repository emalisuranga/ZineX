@extends('vehicle.layout')
   
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Vehicale Detailes</h2>
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
  
    <form action="{{ route('vehicle.update',$vehicle->id) }}" method="POST" style="margin-top: 2rem;">
        @csrf
        @method('PUT')
   
         <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Vehicle No:</strong>
                    <input type="text" name="title" value="{{ $vehicle->vehicle_no }}" class="form-control" placeholder="Vehicle No" readonly>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Owner Name:</strong>
                    <input type="text" name="owner_name" value="{{ $vehicle->owner_name }}" class="form-control" placeholder="Owner Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    <strong>Telephone Number:</strong>
                    <input type="text" name="telephone_number" value="{{ $vehicle->telephone_number }}" class="form-control" placeholder="Telephone Number">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Rate Per km:</strong>
                    <input type="text" name="rent_per_km" value="{{ $vehicle->rent_per_km }}" class="form-control" placeholder="Rate Per km">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
   
    </form>
@endsection