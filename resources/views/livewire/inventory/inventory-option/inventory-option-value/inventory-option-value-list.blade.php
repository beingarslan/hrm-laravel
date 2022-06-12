<div class="table-responsive">

    <form class="form" wire:submit.prevent="filterInventoryOptionValueList" style="margin-top: 20px;">
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
                <th>Option</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($values as $value)
            <tr>
                <td>{{$value->name}}</td>
                <td>{{$value->slug}}</td>
                <td>{{$value->description}}</td>
                <td>{{$value->inventory_option?->name}}</td>
                <td>
                    <div class="btn-group">
                        <li>
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                            </div>
                        </li>
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
        {{ $values->links('livewire.livewire-pagination') }}
    </div>

</div>