@extends('adminStore.adminLayout')
@section('dashboard')
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

						<!--begin::Toolbar-->
						<div class="toolbar" id="kt_toolbar">
							<!--begin::Container-->
							<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">

								<!--begin::Page title-->

								<!--end::Page title-->

							</div>
							<!--end::Container-->
						</div>
						<!--end::Toolbar-->
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
                            <form  action="{{ route('adminCategory.update',$category->id) }}" method="post"  enctype="multipart/form-data">
							  @csrf
							  @method('put')
							  {{-- @include('dashboard.VendorAdmin.categories._form') --}}

                              <div class="form-group py-4">
                                <label for="">Category Name</label>
                                <input type="text" name="name" class="form-control" value="{{$category->name }}">
                              </div>
                              <div class="form-group">
                                <label for="image">Image</label>
                                 <input type="file" name="image" class="form-control" />
                                 @if($category->image)
                                 <img src="{{asset('images/uploads/'.$category->image)}}" alt="" height="60">
                                 @endif
                               </div>
                               <div class="form-group py-4">
                                   <label for="">Description</label>
                                   <textarea class="form-control" name="description">{{$category->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Store Parent</label>
                                    <select type="text" name="parent" class="form-control form-select">
                                        <option value="">Primary Category </option>
                                        @foreach($parents as $parent)
                                        <option value="{{$parent->id}}"
                                            {{$category->store_id == $parent->id ? 'selected' : '' }}>
                                            {{$parent->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group py-4">
                                  <label for="">Status</label>
                                     <div>
                                       <div class="form-check py-2">
                                         <input class="form-check-input" type="radio" name="status" value="active" checked @checked($category->status =='active')>
                                         <label class="form-check-label">Active</label>
                                       </div>
                                       <div class="form-check py-3">
                                         <input class="form-check-input" type="radio" name="status" value="archived" @checked($category->status =='archived')>
                                         <label class="form-check-label">Archived</label>
                                       </div>
                                     </div>
                                </div>
                                <div class="form-group">
                                 <button type="submit" class="btn btn-primary">Save</button>
                                 </div>

							   </form>
                        </div>

							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>
					<!--end::Content-->
@endsection
