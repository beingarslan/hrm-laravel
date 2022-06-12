@extends('layouts.default')

@include('includes.user.approvals.add-css')
@section('content')
<!-- Snow Editor start -->
<section class="snow-editor">
    @livewire('approval.create-approval-request')
</section>
<!-- Snow Editor end -->
@endsection
@include('includes.user.approvals.add-js')