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
            @forelse($teams as $team)
            <tr>
                <td>{{$team->name}}</td>
                <td>{{$team->slug}}</td>
                <td>{{$team->description}}</td>
                <td>
                    <div class="btn-group">
                        <li>
                            <a href="{{route('teams.edit',$team->id)}}" class="btn btn-sm btn-warning">Edit </a>
                        </li>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-right" style="float: right">
        {{ $teams->links('livewire.livewire-pagination') }}
    </div>

</div>