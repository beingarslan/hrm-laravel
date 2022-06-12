@extends('layouts.default')

@include('includes.user.add-user.add-user-css')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Role Registration form</h4>
            </div>
            <div class="card-content">
                <div class="card">
                    <div class="border-bottom-primary"> </div>
                    <div class="card-body py-2 my-25">
                        <form class="validate-form mt-2 pt-50" action="{{ route('roles.store')}}" method="post">
                            @csrf

                            <div class="row">

                                <div class="col-12 col-sm-12 mb-1">
                                    <label class="form-label">
                                        Role Name
                                        <span class="danger">*</span>
                                        @error('name') <span class="danger">{{ $message }}</span> @enderror
                                    </label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter role's name" value="{{old('name')}}" />
                                </div>

                            </div>
                            <div class="row">
                                @forelse($permissions as $permission)
                                <div class="col-md-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="{{$permission}}" name="permissions[]" value="{{$permission}}" >
                                        <label class="custom-control-label " for="{{$permission}}">{{$permission}}</label>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">
                                    <p>No Permissions</p>
                                </div>
                                @endforelse
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