

@extends('adminStore.adminLayout')
@section('dashboard')


<div class="content" style="width: 99%">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex mt-4">
                    <div class="col-md-9">
                        <h4 class="card-title"> Stores List</h4>
                    </div>
                    <div class="col-md-3">
                        <a href="{{route('adminStores.create')}}" class="btn btn-primary">Add Store</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Store Name</th>
                                    <th>Image Store</th>
                                    <th>Vendor Name</th>
                                    <th>Discription</th>
                                    <th>Phone</th>
                                    <th>Settings</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($store as $store)
                                <tr>
                                    <td>{{$store->id}}</td>
                                    <td>{{$store->name}}</td>
                                    <td><img width="80" src="{{asset('images/uploads/'. $store->image)}}" alt="No image employee"></td>
                                    <td>{{$store->vendor_id}}</td>
                                    <td>{{$store->discription}}</td>
                                    <td>{{$store->phone}}</td>
                                    <td>
                                        {{-- <a href="{{route('store.edit',$store->id)}}" class=" btn btn-info">Edit</a> --}}
                                        <a href="{{url('/adminStores/'.$store->id.'/edit/')}}" class=" btn btn-info">Edit</a>
                                        {{-- <form action="{{route('store.destroy',$store->id)}}" method='post' class="d-inline"> --}}
                                        <form action="{{url('/adminStores/'.$store->id)}}" method='post' class="d-inline">
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
                <h1>jhjhjhj</h1>
            </div>
        </div>
    </div>
</div>




@endsection
