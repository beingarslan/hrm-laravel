<div class="table-responsive">

    <form class="form" wire:submit.prevent="filterUserList" style="margin-top: 20px;">
        <div class="form-group col-md-12 d-flex">

            <!-- <label>Name</label> -->
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
            @forelse($roles as $role)
            <tr>
                <td>{{$role->name}}</td>
                <td>{{$role->slug}}</td>
                <td>
                    @forelse($role->permissions as $permission)
                    <span class="badge badge-primary">{{$permission->name}}</span>
                    @empty
                    <span class="badge badge-danger">No Permission</span>
                    @endforelse
                </td>
                <td>
                    <div class="btn-group">
                        <li>
                            <a href="{{route('roles.edit',$role->id)}}" class="btn btn-sm btn-warning">Edit </a>
                        </li>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-right" style="float: right">
        {{ $roles->links('livewire.livewire-pagination') }}
    </div>

</div>