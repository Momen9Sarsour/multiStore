

@extends('adminStore.adminLayout')
@section('dashboard')


<div class="content" style="width: 99%">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex mt-4">
                    <div class="col-md-9">
                        <h4 class="card-title"> Delivery List</h4>
                    </div>
                    <div class="col-md-3">
                <a href="{{route('admin/delivery/create')}}" class="btn btn-primary">Add Delivery</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Delivery Name</th>
                                    <th>Image</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Ipan</th>
                                    <th>Email</th>
                                    <th>Settings</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($delivery as $delivery)
                                <tr>
                                    <td>{{$delivery->id}}</td>
                                    <td>{{$delivery->name}}</td>
                                    <td><img  width="80" src="{{asset('images/uploads/'. $delivery->image)}}" alt="No image delivery"></td>
                                    <td>{{$delivery->phone}}</td>
                                    <td>{{$delivery->address}}</td>
                                    <td>{{$delivery->ipan}}</td>
                                    <td>{{$delivery->email}}</td>
                                    <td>
                                        {{-- <a href="{{route('employee.edit',$employee->id)}}" class=" btn btn-info">Edit</a> --}}
                                        <a href="{{url('/admin/delivery/edit/'.$delivery->id)}}" class=" btn btn-info">Edit</a>
                                        {{-- <form action="{{route('employee.destroy',$employee->id)}}" method='post' class="d-inline"> --}}
                                        <form action="{{url('/admin/delivery/delete/'.$delivery->id)}}" method='post' class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type='submit' class=" btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
