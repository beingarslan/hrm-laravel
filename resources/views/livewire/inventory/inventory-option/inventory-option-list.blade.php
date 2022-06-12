<div class="table-responsive">

    <form class="form" wire:submit.prevent="filterInventoryOptionList" style="margin-top: 20px;">
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
            @forelse($options as $option)
            <tr>
                <td>{{$option->name}}</td>
                <td>{{$option->slug}}</td>
                <td>{{$option->description}}</td>
                <td>
                    <div class="btn-group">
                        <div class="btn-group">
                            @can('edit-inventory-options')
                            <a href="/inventory/options/edit/{{$option->id}}" class="btn btn-sm btn-warning">Edit </a>
                            @endcan
                            @can('view-inventory-option-values')
                            <a href="/inventory/options/values/{{$option->id}}" class="btn btn-sm btn-success">Values </a>
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
        {{ $options->links('livewire.livewire-pagination') }}
    </div>

</div>