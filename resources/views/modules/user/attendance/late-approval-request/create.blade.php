@extends('layouts.default')

@include('includes.user.add-user.add-user-css')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Late Approval Request </h4>
            </div>
            <div class="card-content">
                <div class="card">
                    <div class="border-bottom-primary"> </div>
                    <div class="card-body py-2 my-25">
                        <form class="validate-form mt-2 pt-50" action="{{ route('late_approval_requests.save')}}" method="post">
                            @csrf

                            <div class="row">

                                <div class="col-12 col-sm-12 mb-1">
                                    <label class="form-label">
                                        Reason
                                        <span class="danger">*</span>
                                        @error('late_approval_reason') <span class="danger">{{ $message }}</span> @enderror
                                    </label>
                                    <textarea placeholder="Reason" name="late_approval_reason" class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Request </button>
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
