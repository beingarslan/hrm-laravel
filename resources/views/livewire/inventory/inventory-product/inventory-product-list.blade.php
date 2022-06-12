<div class="table-responsive">

    <form class="form" wire:submit.prevent="filterInventoryProductList" style="margin-top: 20px;">
        <div class="row">
            <div class="form-group col-md-3 d-flex">
                <input type="text" class="form-control" wire:model="name" placeholder="Search with Name">
            </div>
            <div class="form-group col-md-3 d-flex">
                <select class="form-control" wire:model="product_type_id" id="">
                    <option value="" selected>Select Inventory Product Type</option>
                    @foreach($product_types as $product_type)
                    <option value="{{$product_type->id}}">{{$product_type->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3 d-flex">
                <select class="form-control" wire:model="product_category_id" id="">
                    <option value="" class="form-control" selected>Select Inventory Product Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3 d-flex">
                <select class="form-control" wire:model="product_status_id" id="">
                    <option value="" class="form-control" selected>Select Inventory Product Satus</option>
                    @foreach($statuses as $status)
                    <option value="{{$status->id}}">{{$status->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>


    <table class="table table-bordered table-striped">

        <thead>
            <tr class="bg-primary card-head-inverse">
                <th>Name</th>
                <th>SKU</th>
                <th>Cost Price</th>
                <th>Sale Price</th>
                <th>Discount Price</th>
                <th>Type</th>
                <th>Category</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->sku}}</td>
                <td>{{$product->cost_price}}</td>
                <td>{{$product->sale_price}}</td>
                <td>{{$product->discount_price}}</td>
                <td>{{$product->inventoryType?->name}}</td>
                <td>{{$product->inventoryCategory?->name}}</td>
                <td>{{$product->inventoryStatus?->name}}</td>
                <td>
                    <div class="btn-group">
                        <div class="btn-group">
                            @can('edit-inventory-products')
                            <a href="/inventory/products/edit/{{$product->id}}" class="btn btn-sm btn-warning">Edit </a>
                            @endcan
                            @can('view-inventory-products-uniques')
                            <a href="/inventory/products/uniques/{{$product->id}}" class="btn btn-sm btn-success">Uniques</a>
                            @endcan
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center">No data found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="text-right" style="float: right">
        {{ $products->links('livewire.livewire-pagination') }}
    </div>

</div>