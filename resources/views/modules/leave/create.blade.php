@extends('layouts.default')

@include('includes.user.add-user.add-user-css')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Leave Type Registration form</h4>
                </div>
                <div class="card-content">
                    <div class="card">
                        <div class="border-bottom-primary"> </div>
                        <div class="card-body py-2 my-25">
                            <form class="validate-form mt-2 pt-50" action="{{ route('leavetypes.store')}}" method="post">
                                @csrf

                                <div class="row">

                                    <div class="col-12 col-sm-4 mb-1">
                                        <label class="form-label">
                                            Leave Type Name
                                            <span class="danger">*</span>
                                            @error('name') <span class="danger">{{ $message }}</span> @enderror
                                        </label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter leave type's name" value="{{old('name')}}" />
                                    </div>

                                    <div class="col-12 col-sm-4 mb-1">
                                        <label class="form-label">
                                            No of Leaves
                                            <span class="danger">*</span>
                                            @error('total') <span class="danger">{{ $message }}</span> @enderror
                                        </label>
                                        <input type="text" class="form-control" name="total" placeholder="Enter no of leaves" value="{{old('total')}}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label">
                                            Description
                                            <span class="danger">*</span>
                                            @error('description') <span
                                                    class="danger">{{ $message }}</span> @enderror
                                        </label>
                                        <textarea rows = "10" class="form-control" name="description" placeholder="Enter leave type's description" value="{{old('description')}}" ></textarea>
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