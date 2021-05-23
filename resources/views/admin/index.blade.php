@extends('admin.layout')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="row" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);margin-top: 3rem; ">
    <div class="col-lg-12 margin-tb">
        <h2>Dravers Details</h2>
        <table class="table table-bordered" style="margin-top: 2rem; ">
            <tr>

                <th>User Name</th>
                <th>Vehicle Number</th>
                <th>Telephone Number</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($data as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->vehicle_no }}</td>
                <td>{{ $value->telephone_number }}</td>
                <td>

                    <a class="btn btn-info" href="{{ route('admin.show',$value->id) }}">Approved</a>

                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

{!! $data->links() !!}
@endsection