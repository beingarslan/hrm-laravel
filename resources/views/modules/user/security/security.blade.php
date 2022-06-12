@extends('layouts.default')

@include('includes.user.change-password.change-password-css')

@section('content')
<section class="users-edit">
    <!-- change password -->
    @livewire('user.security.change-password')
    <!-- change password end -->

    <!-- BROWSER SESSIONS -->
    @livewire('user.security.user-sessions')
    <!-- BROWSER SESSIONS END -->

    <!-- DELETE ACCOUNT -->
    @livewire('user.security.delete-my-account')
    <!-- DELETE ACCOUNT END -->
  
</section>
@endsection


@include('includes/user/change-password/change-password-js')