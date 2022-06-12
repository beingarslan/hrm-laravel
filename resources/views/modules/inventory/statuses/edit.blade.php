@extends('layouts.default')

@include('includes.user.add-user.add-user-css')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Status</h4>
            </div>
            <div class="card-content">
                <div class="card">
                    <div class="border-bottom-primary"> </div>
                    <div class="card-body py-2 my-25">
                    <form class="validate-form mt-2 pt-50" action="{{ route('inventory.statuses.update')}}" method="post">
                            @csrf
                            <!-- method -->
                            <input type="hidden" name="id" value="{{$status->id}}">
                            <div class="row">

                                <div class="col-12 mb-1">
                                    <label class="form-label">
                                        Name
                                        <span class="danger">*</span>
                                        @error('name') <span class="danger">{{ $message }}</span> @enderror
                                    </label>
                                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{$status->name}}" />
                                </div>

                                <div class="col-12 mb-1">
                                    <label class="form-label"> 
                                        Description 
                                        @error('description') <span class="danger">{{ $message }}</span> @enderror 
                                    </label>
                                    <textarea name="description" id="" class="form-control" cols="30" rows="10" placeholder="Description">{{$status->description}}</textarea>
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