@extends('drivers.layout')

@section('content')
<div class="row" style="margin-top: 5rem;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Drivers Detailes</h2>
        </div>
        <div class="pull-right">
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
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telephone Number:</strong>
                <input type="text" name="telephone_number" value="{{ $drivers->telephone_number }}" class="form-control" placeholder="Enter Telephone Number">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                <input type="text" name="address" value="{{ $drivers->address }}" class="form-control" placeholder="Enter Address">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" value="{{ $drivers->email }}" class="form-control" placeholder="Enter Email">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

</form>
@endsection