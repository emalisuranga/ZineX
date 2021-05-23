@extends('drivers.layout')

@section('content')
<div class="row" style="margin-top: 5rem;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>welcome to zinex rent-a-car</h2>
        </div>
        <div class="pull-right" style="margin-top: 2rem; justify-content: right;display: flex;">
        <a class="btn btn-success" href="{{ route('vehicle.index') }}" style="margin-right: 10px;">View Vahicale</a>
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
<div class="row" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);margin-top: 3rem; ">
    <div class="col-lg-12 margin-tb">
        <h2>Drivers Details</h2>
        <table class="table table-bordered" style="margin-top: 2rem; ">
            <tr>

                <th>Drivers Name</th>
                <th>License No</th>
                <th>Vehicle Number</th>
                <th>Telephone Number</th>
                <th>Address</th>
                <th>Email</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($data as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->license_no }}</td>
                <td>{{ $value->vehicle_no }}</td>
                <td>{{ $value->telephone_number }}</td>
                <td>{{ $value->address }}</td>
                <td>{{ $value->email }}</td>
                <td>

                    <a class="btn btn-info" href="{{ route('drivers.show',$value->id) }}">Assingn</a>
                    <a class="btn btn-primary" href="/drivers/{{$value->id}}/edit">Edit</a>
                    <!-- @csrf
                    @method('DELETE')       -->
                    <a class="btn btn-danger" href="/drivers/{{$value->id}}/delete">Delete</button>

                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

{!! $data->links() !!}
@endsection