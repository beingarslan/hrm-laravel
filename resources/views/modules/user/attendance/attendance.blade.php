@extends('layouts.default')

@include('includes.user-attendence.user-attendence-css')

@section('content')

<!-- Content types section start -->
<section id="content-types">

            <livewire:user.user-attendance />

   

</section>
<!-- Content types section end -->

@endsection

@include('includes.user-attendence.user-attendence-js')