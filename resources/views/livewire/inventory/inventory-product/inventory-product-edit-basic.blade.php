<div>
    <form wire:submit.prevent="save">
        <!-- Step 1 -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="firstName1">Name :</label>
                    <input type="text" wire:model="name" placeholder="Name" class="form-control" id="firstName1">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="lastName1">SKU :</label>
                    <input type="text" wire:model="sku" placeholder="SKU" class="form-control" id="lastName1">
                    @error('sku') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="emailAddress1">Cost Price :</label>
                    <input type="number" placeholder="Cost Price" wire:model="cost_price" class="form-control" id="emailAddress1">
                    @error('cost_price') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="emailAddress1">Sale Price :</label>
                    <input type="number" wire:model="sale_price" placeholder="Sale Price" class="form-control" id="emailAddress1">
                    @error('sale_price') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="emailAddress1">Discount Price :</label>
                    <input type="number" wire:model="discount_price" placeholder="Discount Price" class="form-control" id="emailAddress1">
                    @error('discount_price') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="emailAddress1">Discount Percentage :</label>
                    <input type="number" wire:model="discount_percentage" placeholder=" Discount Percentage" class="form-control" id="emailAddress1">
                    @error('discount_percentage') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-md-6" wire:ignore>
                <div class="form-group">
                    <label for="location1">Inventory Type :</label>
                    <select class="custom-select form-control select2" id="location1"  wire:change="$emit('changeInventoryTypeEvent', $event.target.value)">
                        @foreach($inventory_types as $type)
                        <option {{$type->id == $product_type_id ? 'selected' : ''}} value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                    @error('product_type_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-6" wire:ignore>
                <div class="form-group">
                    <label for="location1">Inventory Category :</label>
                    <select class="custom-select form-control select2" id="location11" wire:change="changeInventoryCategoryEvent($event.target.value)">
                        @foreach($inventory_categories as $category)
                        <option {{$category->id == $product_category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('product_category_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-6" wire:ignore>
                <div class="form-group">
                    <label for="location1">Inventory Status :</label>
                    <select class="custom-select form-control select2" id="location11" wire:change="changeInventoryStatusEvent($event.target.value)">
                        @foreach($inventory_statuses as $status)
                        <option {{$status->id == $product_status_id ? 'selected' : ''}} value="{{$status->id}}">{{$status->name}}</option>
                        @endforeach
                    </select>
                    @error('product_category_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Save and Next <i class="feather icon-chevron-right"></i></button>
                </div>
            </div>
        </div>
        <!-- Step 1 -->
    </form>
</div>
