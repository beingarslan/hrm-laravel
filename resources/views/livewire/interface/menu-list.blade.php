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
                <th>URL</th>
                <th>Icon</th>
                <th>Order</th>
                <th>Status</th>
                <th>Permission</th>
                <th>Parent</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($menus as $menu)
            <tr>
                <td>{{$menu->name}}</td>
                <td>{{$menu->slug}}</td>
                <td>{{$menu->url}}</td>
                <td><i class="{{ $menu->icon }}"></i></td>
                <td>{{$menu->order}}</td>
                <td>{{$menu->status}}</td>
                <td>{{$menu->can}}</td>
                <td>{{$menu->parent?->name}}</td>
                <td>
                    <div class="btn-group">
                        <li>
                            <a href="{{route('interfaces.menus.edit',$menu->id)}}" class="btn btn-sm btn-warning">Edit </a>
                        </li>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-right" style="float: right">
        {{ $menus->links('livewire.livewire-pagination') }}
    </div>

</div>