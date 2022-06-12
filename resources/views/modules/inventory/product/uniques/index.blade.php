@extends('layouts.default')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card box-shadow-0">
            <div class="card-header">
                <h4 class="card-title">Inventory Unique Unique Products
                    @can('add-inventory-products-uniques')
                    <button class="btn btn-primary mb-1" data-toggle="modal" data-target="#exampleModal" style="margin-left: 20px; font-size: 14px; padding: 5px;">Add New Inventory Unique Unique Product</button>
                    @endcan
                </h4>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li>
                            <a data-action="collapse"><i class="feather icon-minus"></i></a>
                        </li>
                        <li>
                            <a data-action="reload"><i class="feather icon-rotate-cw"></i></a>
                        </li>
                        <li>
                            <a data-action="expand"><i class="feather icon-maximize"></i></a>
                        </li>
                        <li>
                            <a data-action="close"><i class="feather icon-x"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <livewire:inventory.inventory-product.unique-product.inventory-unique-product-list :product="$product">
            </div>
        </div>
    </div>
</div>
<!-- add product Model -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('inventory.products.uniques.save')}}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="serial_no">Serial Number</label>
                        <input type="text" class="form-control" name="serial_no" id="serial_no" placeholder="Enter Product Serial Number">
                    </div>
                    <div class="form-group">
                        <label for="product_status_id">Product Status</label>
                        <select class="form-control" name="product_status_id" id="product_status_id">
                            <option value="">Select Product Status</option>
                            @foreach ($statuses as $status)
                            <option value="{{$status->id}}">{{$status->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- add product Model -->

@endsection