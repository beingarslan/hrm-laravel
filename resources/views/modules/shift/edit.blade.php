@extends('layouts.default')
@include('includes.user.add-user.add-user-css')
@section('content')
<section class="users-edit">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Shift Updation form</h4>
                </div>
                <div class="card-content">
                    <div class="card">
                        <div class="border-bottom-primary"> </div>
                        <div class="card-body py-2 my-25">
                            <form class="validate-form mt-2 pt-50" action="{{ route('shifts.update')}}" method="post">
                                @method('patch')
                                @csrf

                                <div class="row">

                                    <div class="col-12 col-sm-4 mb-1">
                                        <label class="form-label">
                                            Designation Name
                                            <span class="danger">*</span>
                                            @error('name') <span class="danger">{{ $message }}</span> @enderror
                                        </label>
                                        <input type="hidden" name="id" value="{{ $shift->id }}" class="form-control">
                                        <input type="text" name="name" value="{{ $shift->name }}" class="form-control">
                                    </div>
                                    <div class="col-12 col-sm-4 mb-1">
                                        <label class="form-label">
                                            Slug
                                            <span class="danger">*</span>
                                            @error('slug') <span class="danger">{{ $message }}</span> @enderror
                                        </label>
                                        <input readonly type="text" name="slug" value="{{ $shift->slug }}" class="form-control">
                                    </div>



                                    <div class="col-12 col-sm-4 mb-1">
                                        <label class="form-label">
                                            Created By
                                            @error('created_by') <span class="danger">{{ $message }}</span> @enderror
                                        </label>
                                        <input readonly type="text" name="created_by" value="{{ $shift->created_by ?? 'n/a'}} " class="form-control">
                                    </div>

                                    <div class="col-12 col-sm-4 mb-1">
                                        <label class="form-label">
                                            Updated By
                                            @error('updated_by') <span class="danger">{{ $message }}</span> @enderror
                                        </label>
                                        <input readonly type="text" name="updated_by" value="{{ $shift->updated_by ?? 'n/a'}} " class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label">
                                            Description
                                            <span class="danger">*</span>
                                            @error('description') <span class="danger">{{ $message }}</span> @enderror
                                        </label>
                                        <textarea rows="10" name="description" class="form-control">{{ $shift->description }}</textarea>
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
                                        <input type="text" name="buffer_time" value="{{ $shift->buffer_time }}" class="form-control">
                                    </div>
                                    <div class="col-12 col-sm-4 mb-1">
                                        <label class="form-label">
                                            Login Time
                                            <span class="danger">*</span>
                                            @error('login') <span class="danger">{{ $message }}</span> @enderror
                                        </label>
                                        <input type="text" name="login" value="{{ $shift->login }}" class="form-control">
                                    </div>
                                    <div class="col-12 col-sm-4 mb-1">
                                        <label class="form-label">
                                            Logout Time
                                            <span class="danger">*</span>
                                            @error('logout') <span class="danger">{{ $message }}</span> @enderror
                                        </label>
                                        <input type="text" name="logout" value="{{ $shift->logout }}" class="form-control">
                                    </div>
                                    <!-- break_in -->
                                    <div class="col-12 col-sm-4 mb-1">
                                        <label class="form-label">
                                            Break In
                                            <span class="danger">*</span>
                                            @error('break_in') <span class="danger">{{ $message }}</span> @enderror
                                        </label>
                                        <input type="text" name="break_in" value="{{ $shift->break_in }}" class="form-control">
                                    </div>
                                    <!-- break_out -->
                                    <div class="col-12 col-sm-4 mb-1">
                                        <label class="form-label">
                                            Break Out
                                            <span class="danger">*</span>
                                            @error('break_out') <span class="danger">{{ $message }}</span> @enderror
                                        </label>
                                        <input type="text" name="break_out" value="{{ $shift->break_out }}" class="form-control">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection