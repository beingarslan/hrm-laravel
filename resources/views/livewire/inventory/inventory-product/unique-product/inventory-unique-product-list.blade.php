<div class="table-responsive">

    <form class="form" wire:submit.prevent="filterInventoryProductList" style="margin-top: 20px;">
        <div class="row">
            <div class="form-group col-md-6 d-flex">
                <input type="text" class="form-control" wire:model="serial_no" placeholder="Search with Serial Number">
            </div>

            <div class="form-group col-md-6 d-flex">
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
                <th>Serial No.</th>
                <th>QA Code</th>
                <th>Status</th>
                <th>Added By</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{$product->serial_no}}</td>
                <td>{{$product->qa_code}}</td>
                <td>{{$product->inventoryStatus?->name}}</td>
                <td>{{$product->created_by}}</td>
                <td>
                    <div class="btn-group">
                        <div class="btn-group">
                            @can('remove-inventory-products-uniques')
                            <button class="btn btn-sm btn-danger">Remove </button>
                            @endcan
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No data found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="text-right" style="float: right">
        {{ $products->links('livewire.livewire-pagination') }}
    </div>

</div>