@extends('layouts.default')
@include('includes.inventory.products.page-css')
@section('content')
<section class="users-edit">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
            @livewire('inventory.inventory-product.inventory-product-edit', [ 'product' => $product])
            </div>
        </div>
    </div>
</section>
@endsection
