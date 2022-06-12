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
                <th>Buffer Time</th>
                <th>Login</th>
                <th>Logout</th>
                <th>Break In</th>
                <th>Break Out</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($shifts as $shift)
            <tr>
                <td>{{$shift->name}}</td>
                <td>{{$shift->slug}}</td>
                <td>{{$shift->buffer_time}}</td>
                <td>{{$shift->login}}</td>
                <td>{{$shift->logout}}</td>
                <td>{{$shift->break_in}}</td>
                <td>{{$shift->break_out}}</td>
                <td>
                    <div class="btn-group">
                        <li>
                            <a href="{{route('shifts.edit',$shift->id)}}" class="btn btn-sm btn-warning">Edit </a>
                        </li>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-right" style="float: right">
        {{ $shifts->links('livewire.livewire-pagination') }}
    </div>

</div>