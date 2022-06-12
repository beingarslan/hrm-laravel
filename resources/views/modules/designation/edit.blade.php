@extends('layouts.default')
@include('includes.user.add-user.add-user-css')
@section('content')
    <section class="users-edit">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Designation Updation form</h4>
                    </div>
                    <div class="card-content">
                        <div class="card">
                            <div class="border-bottom-primary"> </div>
                            <div class="card-body py-2 my-25">
                                <form class="validate-form mt-2 pt-50" action="{{ route('designations.update')}}" method="post">
                                    @method('patch')
                                    @csrf

                                    <div class="row">

                                        <div class="col-12 col-sm-4 mb-1">
                                            <label class="form-label">
                                                Designation Name
                                                <span class="danger">*</span>
                                                @error('name') <span class="danger">{{ $message }}</span> @enderror
                                            </label>
                                            <input type="hidden" name="id" value="{{ $designation->id }}" class="form-control">
                                            <input type="text" name="name" value="{{ $designation->name }}" class="form-control">
                                        </div>
                                        <div class="col-12 col-sm-4 mb-1">
                                            <label class="form-label">
                                                Slug
                                                <span class="danger">*</span>
                                                @error('slug') <span class="danger">{{ $message }}</span> @enderror
                                            </label>
                                            <input readonly type="text" name="slug" value="{{ $designation->slug }}" class="form-control">
                                        </div>



                                        <div class="col-12 col-sm-4 mb-1">
                                            <label class="form-label">
                                                Created By
                                                @error('created_by') <span class="danger">{{ $message }}</span> @enderror
                                            </label>
                                            <input readonly type="text" name="created_by" value="{{ $designation->created_by ?? 'n/a'}} " class="form-control">
                                        </div>

                                        <div class="col-12 col-sm-4 mb-1">
                                            <label class="form-label">
                                                Updated By
                                                @error('updated_by') <span class="danger">{{ $message }}</span> @enderror
                                            </label>
                                            <input readonly type="text" name="updated_by" value="{{ $designations->updated_by ?? 'n/a'}} " class="form-control">
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
                                            <textarea rows = "10"  name="description" class="form-control">{{ $designation->description }}</textarea>
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
