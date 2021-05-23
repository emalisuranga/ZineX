@extends('vehicle.layout')
 
@section('content')
<div class="row" style="margin-top: 5rem;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left col-md-12">
            <h2>welcome to zinex rent-a-car</h2><br>
        </div>
        <div class="pull-right" style="margin-top: 2rem; justify-content: right;display: flex;">
        <a class="btn btn-success" href="{{ route('drivers.index') }}" style="margin-right: 10px;">View Drivers</a>
            <a class="btn btn-success" href="{{ route('drivers.create') }}" style="margin-right: 10px;">Add New Drivers</a>
            <a class="btn btn-success" href="{{ route('vehicle.create') }}">Add New Vahicale</a>
        </div>
    </div>
</div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered" style="margin-top: 2rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <tr>
            <th>Vehicle No</th>
            <th>Owner Name</th>
            <th>Telephone Number</th>
            <th>Vehicle Type</th>
            <th>Rate Per km</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ $value->vehicle_no }}</td>
            <td>{{ $value->owner_name }}</td>
            <td>{{ $value->telephone_number }}</td>
            <td>{{ $value->vehicle_type }}</td>
            <td>{{ $value->rent_per_km }}</td>
            <td>
                <form action="{{ route('vehicle.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('vehicle.show',$value->id) }}">Show</a>    
                    <a class="btn btn-primary" href="{{ route('vehicle.edit',$value->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}      
@endsection