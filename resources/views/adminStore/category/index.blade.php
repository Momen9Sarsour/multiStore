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
                            <div class="mb-5">
                            <a href="{{ route('adminCategory.create') }}" class="btn btn-sm btn-outline-primary">Create</a>
                            </div>
							@if(session()->has('success'))
                             <div class="alert-alert-success">
								{{(session('success'))}}
							 </div>
							@endif

							@if(session()->has('info'))
                             <div class="alert-alert-info">
								{{(session('info'))}}
							 </div>
							@endif
                            <table class="table">
                                <thead>
                                   <tr>
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>Image</th>
                                       <th>Description</th>
                                       <th>Store</th>
                                       <th>Status</th>
                                       <th colspan="2">Seting</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 @forelse($category as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td><img src="{{asset('images/uploads/'.$category->image)}}" alt="No Image" height="50"></td>
                                        <td>{{$category->description}}</td>
                                        <td>{{$category->store->name}}</td>
                                        <td>{{$category->status}}</td>
                                        <td>
                                        <a href="{{ route('adminCategory.edit',$category->id)}}"class="btnbtn-smbtn-outline-success ">Edit</a>
                                        </td>
                                        <td>
                                          <form action="{{ route('adminCategory.destroy', $category->id) }}" method="post">
                                          @csrf
                                          @method('delete')
                                          <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                          </form>

                                        </td>
                                    </tr>
                                    @empty
                                     <tr>
                                      <td colspan="7">No categories defined.</td>
                                     </tr>
                                     @endforelse
                                  </tbody>
                                </table>
                            </div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>
					<!--end::Content-->
@endsection
