@extends('drivers.layout')

@section('content')

<div class="row" style="margin-top: 45px;">
    <div class="col" >
        <h2> Edit Drivers Detailes</h2>
    </div>
    <div class="col">
        <div class="pull-right" style="margin-left: 500px;">
            <a class="btn btn-primary" href="{{ route('drivers.index') }}"> Back</a>
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

<form action="{{ route('drivers.update',$drivers->id) }}" method="POST" style="margin-top: 2rem;">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Drivers Name:</strong>
                <input type="text" name="name" value="{{ $drivers->name }}" class="form-control" placeholder="Vehicle No" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>License No:</strong>
                <input type="text" name="license_no" value="{{ $drivers->license_no }}" class="form-control" placeholder="Owner Name" readonly>
                <input type="text" name="id" value="{{ $drivers->id }}" class="form-control" placeholder="Owner Name" hidden>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vehicle Number:</strong>
                <select name="vehicale_id" class="form-control" style="width:250px">
                    <option value="">--- Select Vehicle Number ---</option>
                    @foreach ($vehicle as $key => $value)
                    <option value="{{ $value->id }}" {{ ( $value->id == $drivers->vehicale_id) ? 'selected' : '' }}>{{$value->vehicle_no }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Assingn Vehical</button>
        </div>
    </div>

</form>
@endsection