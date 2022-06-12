<div class="table-responsive">

    <form class="form" wire:submit.prevent="filterInventoryBrandList" style="margin-top: 20px;">
        <div class="form-group col-md-12 d-flex">
            <input type="text" class="form-control" wire:model="name" placeholder="Search with Name">
        </div>
    </form>


    <table class="table table-bordered table-striped">

        <thead>
            <tr class="bg-primary card-head-inverse">
                <th>Name</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($brands as $brand)
            <tr>
                <td>{{$brand->name}}</td>
                <td>{{$brand->slug}}</td>
                <td>{{$brand->description}}</td>
                <td>
                    <div class="btn-group">
                        @can('edit-inventory-brands')
                        <a href="/inventory/brands/edit/{{$brand->id}}" class="btn btn-sm btn-warning">Edit </a>
                        @endcan
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
        {{ $brands->links('livewire.livewire-pagination') }}
    </div>

</div>