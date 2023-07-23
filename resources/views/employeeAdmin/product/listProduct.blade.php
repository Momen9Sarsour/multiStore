@extends('employeeAdmin.layoutEmployeeAdmin')
@section('dashboard')


<div class="content" style="width: 99%">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex mt-4">
                    <div class="col-md-9">
                        <h4 class="card-title"> Product List</h4>
                    </div>
                    {{-- <div class="col-md-3">
                <a href="{{route('admin/employee/create')}}" class="btn btn-primary">Add Employee</a>
                    </div> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Image</th>
                                    <th>category</th>
                                    <th>price</th>
                                    <th>description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product as $product)
                                <tr>
                                    {{-- <td>{{$product->id}}</td> --}}
                                    <td>{{$product->name}}</td>
                                    <td><img  width="80" src="{{asset('images/uploads/'. $product->image)}}" alt="No image product"></td>
                                    <td>{{$product->category_id}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->storgeQuantity}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->store_id}}</td>
                                    {{-- <td> --}}
                                        {{-- <a href="{{route('employee.edit',$employee->id)}}" class=" btn btn-info">Edit</a> --}}
                                        {{-- <a href="{{url('/admin/employee/edit/'.$employee->id)}}" class=" btn btn-info">Edit</a> --}}
                                        {{-- <form action="{{route('employee.destroy',$employee->id)}}" method='post' class="d-inline"> --}}
                                        {{-- <form action="{{url('/admin/employee/delete/'.$employee->id)}}" method='post' class="d-inline"> --}}
                                            {{-- @csrf --}}
                                            {{-- @method('DELETE') --}}
                                            {{-- <button type='submit' class=" btn btn-danger">Delete</button> --}}
                                        {{-- </form> --}}
                                    {{-- </td> --}}
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
