<div>
    <form wire:submit.prevent="save">
        <input type="hidden" wire:model="product_id">
        <!-- Step 1 -->
        <div class="row">

            <div class="col-md-12">
                <div class="form-group">
                    <label for="eventType1">Title :</label>
                    <input type="text" class="form-control" id="jobTitle1" placeholder="Title" wire:model="title">
                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="shortDescription1"> Description :</label>
                    <textarea wire:model="description" placeholder="Description" id="shortDescription1" rows="4" class="form-control"></textarea>
                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="eventType1">Keywords :</label>
                    <input type="text" class="form-control" id="jobTitle1" placeholder="Keywords" wire:model="keywords" data-role="tagsinput">
                    @error('keywords') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group">
                    <label for="eventType1">Tags :</label>
                    <input type="text" class="form-control" id="jobTitle1" placeholder="Tags" wire:model="tags" value="" data-role="tagsinput">
                    @error('tags') <span class="text-danger">{{ $message }}</span> @enderror
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
