@extends('layouts.default')

@section('content')


@include('includes.inventory.products.page-css')
    @section('content')
    <section id="number-tabs">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content ">
                        <div class="card-body">
                            <ul class="nav nav-tabs mb-2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center  {{1 ? 'active' : ''}}" id="account-tab">
                                        <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Basic</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center {{0 ? 'active' : ''}}" id="information-tab">
                                        <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Variations</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center {{0 ? 'active' : ''}}" id="information-tab">
                                        <i class="feather icon-book mr-25"></i><span class="d-none d-sm-block">SEO</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center {{0 ? 'active' : ''}}" id="information-tab">
                                        <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Media</span>
                                    </a>
                                </li>
                            </ul>
                            <form method="POST" action="{{route('inventory.products.save')}}">
                                @csrf
                                <!-- Step 1 -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstName1">Name :</label>
                                            <input type="text" name="name" placeholder="Name" class="form-control" id="firstName1" value="{{ old('name') }}">
                                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastName1">SKU :</label>
                                            <input type="text" name="sku" placeholder="SKU" class="form-control" id="lastName1" value="{{ old('sku') }}">
                                            @error('sku') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emailAddress1">Cost Price :</label>
                                            <input type="number" placeholder="Cost Price" name="cost_price" class="form-control" id="emailAddress1" value="{{ old('cost_price') }}">
                                            @error('cost_price') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emailAddress1">Sale Price :</label>
                                            <input type="number" name="sale_price" placeholder="Sale Price" class="form-control" id="emailAddress1" value="{{ old('sale_price') }}">
                                            @error('sale_price') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emailAddress1">Discount Price :</label>
                                            <input type="number" name="discount_price" placeholder="Discount Price" class="form-control" id="emailAddress1" value="{{ old('discount_price') }}">
                                            @error('discount_price') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emailAddress1">Discount Percentage :</label>
                                            <input type="number" name="discount_percentage" placeholder=" Discount Percentage" class="form-control" id="emailAddress1" value="{{ old('discount_percentage') }}">
                                            @error('discount_percentage') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location1">Inventory Type :</label>
                                            <select class="custom-select form-control" id="location1" name="product_type_id">
                                                <option selected disabled value="">Select Type</option>
                                                @foreach($inventory_types as $type)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('product_type_id') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location1">Inventory Category :</label>
                                            <select class="custom-select form-control" id="location1" name="product_category_id">
                                                <option selected disabled value="">Select Category</option>
                                                @foreach($inventory_categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('product_category_id') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location1">Inventory Status :</label>
                                            <select class="custom-select form-control" id="location1" name="product_status_id">
                                                <option selected disabled value="">Select Status</option>
                                                @foreach($inventory_statuses as $status)
                                                <option value="{{$status->id}}">{{$status->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('product_status_id') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Save and Next <i class="feather icon-chevron-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Step 1 -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
    @include('includes.inventory.products.page-js')

@endsection