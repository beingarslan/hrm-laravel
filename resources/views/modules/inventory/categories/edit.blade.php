@extends('layouts.default')

@include('includes.user.add-user.add-user-css')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Category</h4>
            </div>
            <div class="card-content">
                <div class="card">
                    <div class="border-bottom-primary"> </div>
                    <div class="card-body py-2 my-25">
                    <form class="validate-form mt-2 pt-50" action="{{ route('inventory.categories.update')}}" method="post">
                            @csrf
                            <!-- method -->
                            <input type="hidden" name="id" value="{{$category->id}}">
                            <div class="row">

                                <div class="col-12 mb-1">
                                    <label class="form-label">
                                        Name
                                        <span class="danger">*</span>
                                        @error('name') <span class="danger">{{ $message }}</span> @enderror
                                    </label>
                                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{$category->name}}" />
                                </div>

                                <div class="col-12 mb-1">
                                    <label class="form-label" for="accountZipCode">Parent Category 
                                    @error('parent_id') <span class="danger">{{ $message }}</span> @enderror </label>
                                    <select class="form-control select2" name="parent_id">
                                        <option value="">Select Parent</option>
                                        @foreach ($categories as $obj)
                                        <option value="{{$obj->id}}" {{ ($category->parent_id == $obj->id ? "selected":"") }}>{{$obj->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 mb-1">
                                    <label class="form-label"> 
                                        Description 
                                        @error('description') <span class="danger">{{ $message }}</span> @enderror 
                                    </label>
                                    <textarea name="description" id="" class="form-control" cols="30" rows="10" placeholder="Description">{{$category->description}}</textarea>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary"> Update </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@include('includes.user.add-user.add-user-js')