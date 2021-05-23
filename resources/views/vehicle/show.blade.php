@extends('vehicle.layout')
  
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> {{ $vehicle->vehicle_no }} Vehicale Detailes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('vehicle.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row" style="margin-top: 2rem;">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div class="col-xs-3 col-sm-3 col-md-3"><strong >Vehicle No:</strong></div>
                {{ $vehicle->vehicle_no }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <div class="col-xs-3 col-sm-3 col-md-3"><strong>Owner Name:</strong></div>
                {{ $vehicle->owner_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <div class="col-xs-3 col-sm-3 col-md-3"><strong>Telephone Number:</strong></div>
                {{ $vehicle->telephone_number }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <div class="col-xs-3 col-sm-3 col-md-3"><strong>Vehicle Type:</strong></div>
                {{ $vehicle->vehicle_type }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <div class="col-xs-3 col-sm-3 col-md-3"><strong>Rate Per km:</strong></div>
                Rs: {{ $vehicle->rent_per_km }}
            </div>
        </div>
    </div>
@endsection