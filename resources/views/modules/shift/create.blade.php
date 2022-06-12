@extends('layouts.default')

@include('includes.user.add-user.add-user-css')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Shifts Registration form</h4>
            </div>
            <div class="card-content">
                <div class="card">
                    <div class="border-bottom-primary"> </div>
                    <div class="card-body py-2 my-25">
                        <form class="validate-form mt-2 pt-50" action="{{ route('shifts.store')}}" method="post">
                            @csrf

                            <div class="row">

                                <div class="col-12 col-sm-12 mb-1">
                                    <label class="form-label">
                                        Shift Timing
                                        <span class="danger">*</span>
                                        @error('name') <span class="danger">{{ $message }}</span> @enderror
                                    </label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter shift's timing" value="{{old('name')}}" />
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label">
                                        Description
                                        <span class="danger">*</span>
                                        @error('description') <span class="danger">{{ $message }}</span> @enderror
                                    </label>
                                    <textarea rows="10" class="form-control" name="description" placeholder="Enter shift's description" value="{{old('description')}}"></textarea>
                                </div>
                            </div>
                            <!-- buffer_time -->
                            <div class="row mt-1">
                                <div class="col-12 col-sm-4 mb-1">
                                    <label class="form-label">
                                        Buffer Time
                                        <span class="danger">*</span>
                                        @error('buffer_time') <span class="danger">{{ $message }}</span> @enderror
                                    </label>
                                    <input type="text" class="form-control" name="buffer_time" placeholder="Enter buffer time" value="{{old('buffer_time')}}" />
                                </div>
                                <div class="col-12 col-sm-4 mb-1">
                                    <label class="form-label">
                                        Login Time
                                        <span class="danger">*</span>
                                        @error('login') <span class="danger">{{ $message }}</span> @enderror
                                    </label>
                                    <input type="text" class="form-control" name="login" placeholder="Enter login time" value="{{old('login')}}" />
                                </div>
                                <!-- logout -->
                                <div class="col-12 col-sm-4 mb-1">
                                    <label class="form-label">
                                        Logout Time
                                        <span class="danger">*</span>
                                        @error('logout') <span class="danger">{{ $message }}</span> @enderror
                                    </label>
                                    <input type="text" class="form-control" name="logout" placeholder="Enter logout time" value="{{old('logout')}}" />
                                </div>
                                <!-- break_in -->
                                <div class="col-12 col-sm-4 mb-1">
                                    <label class="form-label">
                                        Break In
                                        <span class="danger">*</span>
                                        @error('break_in') <span class="danger">{{ $message }}</span> @enderror
                                    </label>
                                    <input type="text" class="form-control" name="break_in" placeholder="Enter break in time" value="{{old('break_in')}}" />
                                </div>
                                <!-- break_out -->
                                <div class="col-12 col-sm-4 mb-1">
                                    <label class="form-label">
                                        Break Out
                                        <span class="danger">*</span>
                                        @error('break_out') <span class="danger">{{ $message }}</span> @enderror
                                    </label>
                                    <input type="text" class="form-control" name="break_out" placeholder="Enter break out time" value="{{old('break_out')}}" />
                                </div>
                            </div>
                            <div class="row mt-1">
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