@extends('employeeAdmin.layoutEmployeeAdmin')
@section('dashboard')


<div class="content" style="width: 99%">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex mt-4">
                    <div class="col-md-9">
                        <h4 class="card-title"> Order List</h4>
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
                                    <th>user_id</th>
                                    <th>store_id</th>
                                    <th>delivery_id</th>
                                    <th>product_id</th>
                                    <th>price_total</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->user_id}}</td>
                                    {{-- <td><img  width="80" src="{{asset('images/uploads/'. $order->image)}}" alt="No image order"></td> --}}
                                    <td>{{$order->store_id}}</td>
                                    <td>{{$order->delivery_id}}</td>
                                    <td>{{$order->product_id}}</td>
                                    <td>{{$order->price_total}}</td>
                                    <td>{{$order->status}}</td>
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
