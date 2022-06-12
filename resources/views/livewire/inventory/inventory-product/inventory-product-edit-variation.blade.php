<div>
    <!-- Variations list -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-toolbar">
                        <form wire:submit.prevent="save">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="location1">Variations :</label>
                                        <select class="custom-select form-control select2" id="location1" wire:change="getinventoryOptionValues($event.target.value)">
                                            <option value="">Select Variation</option>
                                            @foreach($inventoryOptions as $option)
                                            <option value="{{$option->id}}">{{$option->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('selected_variation_id') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="location2">Add Variation :</label>
                                        <select wire:ignore.self class="custom-select form-control select2" wire:model='selected_variation_option_value_id' id="location2" wire:change="changeVariationEvent($event.target.value)">
                                            @forelse($inventoryOptionValues as $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                            @empty
                                            <option value="">Select Variation</option>
                                            @endforelse
                                        </select>
                                        @error('selected_variation_option_id') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <br>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Value</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($variations as $variation)
                                            <tr>
                                                <td>{{ $variation->inventoryOption?->name }}</td>
                                                <td>{{ $variation->inventoryOptionValue?->name }}</td>
                                                <td>
                                                    <button wire:click="remove({{$variation->id}})" class="btn btn-sm btn-danger">Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>