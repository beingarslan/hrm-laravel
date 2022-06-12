@extends('layouts.default')
@include('includes.user.add-user.add-user-css')
@section('content')
<section class="users-edit">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                @livewire('user.edit-user-container', [ 'userId' => $userId])
            </div>
        </div>
    </div>
</section>
@endsection
