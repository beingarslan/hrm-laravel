<div class="table-responsive">

    <form class="form" wire:submit.prevent="filterInventoryCategoryList" style="margin-top: 20px;">
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
                <th>Parent</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->slug}}</td>
                <td>{{$category->description}}</td>
                <td>{{$category->parent->name ?? 'NA'}}</td>
                <td>
                    <div class="btn-group">
                        @can('edit-inventory-categories')
                            <a href="/inventory/categories/edit/{{$category->id}}" class="btn btn-sm btn-warning">Edit </a>
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
        {{ $categories->links('livewire.livewire-pagination') }}
    </div>

</div>