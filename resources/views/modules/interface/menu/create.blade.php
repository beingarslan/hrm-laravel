@extends('layouts.default')

@include('includes.user.add-user.add-user-css')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Menu Details Form</h4>
            </div>
            <div class="card-content">
                <!-- error -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card">
                    <div class="border-bottom-primary"> </div>
                    <div class="card-body py-2 my-25">
                        <form class="validate-form mt-2 pt-50" action="{{ route('interfaces.menus.store')}}" method="post">
                            @csrf

                            <div class="row">

                                <div class="col-12 col-sm-4 mb-1">
                                    <label class="form-label">
                                        Menu Name
                                        <span class="danger">*</span>
                                        @error('name') <span class="danger">{{ $message }}</span> @enderror
                                    </label>
                                    <input type="text" class="form-control" name="name" placeholder="Menu Name" value="{{old('name')}}" />
                                </div>

                                <div class="col-12 col-sm-4 mb-1">
                                    <label class="form-label">
                                        Menu Slug
                                        <span class="danger">*</span>
                                        @error('slug') <span class="danger">{{ $message }}</span> @enderror
                                    </label>
                                    <input type="text" class="form-control" name="slug" placeholder="Menu Slug" value="{{old('slug')}}" />
                                </div>

                                <div class="col-12 col-sm-4 mb-1">
                                    <label class="form-label">
                                        Menu URL
                                        <span class="danger">*</span>
                                        @error('url') <span class="danger">{{ $message }}</span> @enderror
                                    </label>
                                    <input type="text" class="form-control" name="url" placeholder="Menu URL" value="{{old('url')}}" />
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-12 col-sm-4 mb-1">
                                    <label class="form-label">
                                        Menu Icon <small>(Add classes only)</small>
                                        <span class="danger">*</span>
                                        @error('icom') <span class="danger">{{ $message }}</span> @enderror
                                    </label>
                                    <input type="text" class="form-control" name="icon" placeholder="Menu Icon" value="{{old('icon')}}" />
                                </div>

                                <div class="col-12 col-sm-4 mb-1">
                                    <label class="form-label">
                                        Menu Order
                                        <span class="danger">*</span>
                                        @error('order') <span class="danger">{{ $message }}</span> @enderror
                                    </label>
                                    <input type="number" min="1" class="form-control" name="order" placeholder="Menu Order" value="{{old('order', 1)}}" />
                                </div>

                                <div class="col-12 col-sm-4 mb-1">
                                    <div class="form-group">
                                        <label for="location1">Menu Status :</label>
                                        <select class="custom-select form-control" id="location1" name="status">
                                            <option value="active">Active</option>
                                            <option value="active">Inactive</option>
                                        </select>
                                        @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4 mb-1">
                                    <div class="form-group">
                                        <label for="location1">Menu Permission :</label>
                                        <select class="custom-select form-control" id="location1" name="can">
                                            <option selected disabled value="">Select Permission</option>
                                            @foreach($permissions as $permission)
                                            <option value="{{$permission}}">{{$permission}}</option>
                                            @endforeach
                                        </select>
                                        @error('can') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4 mb-1">
                                    <div class="form-group">
                                        <label for="location1">Menu Parent :</label>
                                        <select class="custom-select form-control" id="location1" name="parent_id">
                                            <option selected disabled value="">Select Parent</option>
                                            @foreach($menus as $menu)
                                            <option value="{{$menu->id}}">{{$menu->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('parent_id') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Add</button>
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