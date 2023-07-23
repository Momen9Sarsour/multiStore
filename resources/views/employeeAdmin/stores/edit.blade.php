@extends('employeeAdmin.layoutEmployeeAdmin')
@section('dashboard')

<div class="container py-3">
    {{-- <form action="{{url('products/update/'.$store->id)}}" method="post" enctype="multipart/form-data"> --}}
    <form action="{{url('/employeeAdmin/stores/update/'.$store->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nameFormControlInput" class="form-label">Name Store</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$store->name}}" placeholder="Name Store">
            {{-- <input type="text" class="form-control" id="name" name="name" placeholder="Name Store"> --}}
        </div>
        <div class="mb-3">
            <label for="imageFormControlInput"  class="form-label">Image Store</label>
            <input type="file" class="form-control" style="margin-bottom:5px"  id="image" name="image" placeholder="Image Store">
            <img width="80" src="{{asset('images/uploads/'. $store->image)}}" alt="">
        </div>
        <div class="mb-3">
            <label for="quantityFormControlInput" class="form-label">Phone</label>
            {{-- <input type="number" class="form-control" id="phone" name="phone" value="{{$store->quantity}}" placeholder="Phone"> --}}
            <input type="phone" class="form-control" id="phone" name="phone"  value="{{$store->phone}}" placeholder="Phone">
        </div>
        <div class="mb-3">
            <label for="descriptionFormControlTextarea" class="form-label">Discription</label>
            {{-- <textarea class="form-control" id="description" name="description"  rows="3">{{$store->description}}</textarea> --}}
            <textarea class="form-control" id="discription" name="discription" rows="3">{{$store->discription}}</textarea>
        </div>
        <div class="mb-3">
            <label for="priceFormControlInput"  class="form-label">Vendor email</label>
            {{-- <input type="number" class="form-control" id="price" name="price" value="{{$store->price}}" placeholder="سعر المنتج"> --}}
            <input type="number" class="form-control" id="vendorEmail" name="vendorEmail" value="{{$store->vendor_id}}" placeholder="Vendor Email">
        </div>
        <div class="mb-3">
            <input type="submit" value="Save" class="btn btn-info">
        </div>
    </form>
</div>

@endsection
