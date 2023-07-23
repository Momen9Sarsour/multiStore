@extends('adminStore.adminLayout')
@section('dashboard')

<div class="container py-3">
    {{-- <form action="{{url('/admin/stores/store')}}" method="post" enctype="multipart/form-data"> --}}
    <form action="{{route('admin/stores/store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nameFormControlInput" class="form-label">Name Store</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name Store">
        </div>
        <div class="mb-3">
            <label for="imageFormControlInput" class="form-label">Image Store</label>
            <input type="file" class="form-control" id="image" name="image" placeholder="Image Store">
        </div>
        <div class="mb-3">
            <label for="quantityFormControlInput" class="form-label">Phone</label>
            <input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone">
        </div>
        <div class="mb-3">
            <label for="descriptionFormControlTextarea" class="form-label">Discription</label>
            <textarea class="form-control" id="discription" name="discription" placeholder="Discription" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="priceFormControlInput" class="form-label">Vendor email</label>
            <input type="number" class="form-control" id="vendorEmail" name="vendorEmail" placeholder="Vendor email">
        </div>
        <div class="mb-3">
            <input type="submit" value="Save" class="btn btn-info">
        </div>
    </form>
</div>

@endsection
