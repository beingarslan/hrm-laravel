<div class="table-responsive">

    <form class="form" wire:submit.prevent="filterUserList" style="margin-top: 20px;">
        <div class="form-group col-md-12 d-flex">
            <input type="text" class="form-control" wire:model="name" placeholder="search with name">
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
            @forelse($departments as $department)
            <tr>
                <td>{{$department->name}}</td>
                <td>{{$department->slug}}</td>
                <td>{{$department->description}}</td>
                <td>
                    <div class="btn-group">
                        @can('edit-master-departments')
                            <a href="{{route('departments.edit',$department->id)}}" class="btn btn-sm btn-warning">Edit </a>
                        @endcan
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-right" style="float: right">
        {{ $departments->links('livewire.livewire-pagination') }}
    </div>

</div>