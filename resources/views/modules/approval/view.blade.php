@extends('layouts.default')

@include('includes.user.approvals.add-css')
@section('content')
<!-- approval tile -->
<h1 class="text-primary mb-2">{{$approval->title}}</h1>
<!-- list of approvals -->
<div class="row">
    <div class="col-12">
    @livewire('approval.view-approval', ['approval' => $approval])
    </div>
</div>
@endsection

@include('includes.user.approvals.add-js')