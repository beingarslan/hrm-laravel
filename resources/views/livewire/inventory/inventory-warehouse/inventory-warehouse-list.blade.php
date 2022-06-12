<div class="table-responsive">

    <form class="form" wire:submit.prevent="filterInventoryStatusList" style="margin-top: 20px;">
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
            @forelse($houses as $house)
            <tr>
                <td>{{$house->name}}</td>
                <td>{{$house->slug}}</td>
                <td>{{$house->description}}</td>
                <td>
                    <div class="btn-group">
                        <div class="btn-group">
                            @can('edit-inventory-warehouses')
                            <a href="/inventory/warehouses/edit/{{$house->id}}" class="btn btn-sm btn-warning">Edit </a>
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
        {{ $houses->links('livewire.livewire-pagination') }}
    </div>

</div>