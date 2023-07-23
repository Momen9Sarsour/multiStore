@extends('adminStore.adminLayout')
@section('dashboard')

<div class="container py-3">
    {{-- <form action="{{url('/admin/stores/update/'.$employee->id)}}" method="post" enctype="multipart/form-data"> --}}
    <form action="{{url('/admin/employee/update/'.$employee->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nameFormControlInput" class="form-label">Name Employee</label>
            {{-- <input type="text" class="form-control" id="name" name="name" value="{{$employee->name}}" placeholder="Name Employee"> --}}
            <input type="text" class="form-control" id="name" name="name" value="{{$employee->name}}" placeholder="Name Employee">
        </div>
        <div class="mb-3">
            <label for="imageFormControlInput"  class="form-label">Image Employee</label>
            <input type="file" class="form-control" style="margin-bottom:5px"  id="image" name="image" placeholder="Image Employee">
            <img width="80" src="{{asset('images/uploads/'. $employee->image)}}" alt="">
        </div>
        <div class="mb-3">
            <label for="quantityFormControlInput" class="form-label">Phone</label>
            {{-- <input type="number" class="form-control" id="phone" name="phone" value="{{$employee->phone}}" placeholder="Phone"> --}}
            <input type="phone" class="form-control" id="phone" name="phone" value="{{$employee->phone}}" placeholder="Phone">
        </div>
        <div class="mb-3">
            <label for="descriptionFormControlTextarea" class="form-label">Address</label>
            {{-- <textarea class="form-control" id="address" name="address"  rows="3">{{$employee->address}}</textarea> --}}
            <textarea class="form-control" id="address" name="address"  rows="3">{{$employee->address}}</textarea>
        </div>
        <div class="mb-3">
            <label for="priceFormControlInput"  class="form-label">Employee Ipan</label>
            {{-- <input type="email" class="form-control" id="price" name="price" value="{{$employee->ipan}}" placeholder="سعر المنتج"> --}}
            <input type="text" class="form-control" id="ipan" name="ipan" value="{{$employee->ipan}}" placeholder="Employee Ipan">
        </div>
        <div class="mb-3">
            <label for="priceFormControlInput"  class="form-label">Employee email</label>
            {{-- <input type="email" class="form-control" id="price" name="price" value="{{$employee->email}}" placeholder="سعر المنتج"> --}}
            <input type="email" class="form-control" id="employeeEmail" name="employeeEmail" value="{{$employee->email}}" placeholder="Employee Email">
        </div>
        <div class="mb-3">
            <input type="submit" value="Save" class="btn btn-info">
        </div>
    </form>
</div>

@endsection
