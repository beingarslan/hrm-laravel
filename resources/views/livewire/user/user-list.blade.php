<div class="table-responsive">

    <form class="form" wire:submit.prevent="filterUserList" style="margin-top: 20px;">
        <div class="form-group col-md-12 d-flex">

            <div class="form-group col-md-2">
                <label>Use Name</label>
                <input type="text" class="form-control" wire:model="full_name" placeholder="search with name">
            </div>

            <div class="form-group col-md-2">
                <label>Email</label>
                <input type="text" class="form-control" wire:model="email" placeholder="search with email">
            </div>

            <div class="form-group col-md-2">
                <label> Select Department</label>
                <select wire:model="department_id" class="form-control">
                    <option value="" selected>Select Department</option>
                    @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-2">
                <label> Select Designation</label>
                <select wire:model="designation_id" class="form-control">
                    <option value="" selected>Select Designation</option>
                    @foreach($designations as $designation)
                    <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-2">
                <label> Select Role</label>
                <select wire:model="role_id" class="form-control">
                    <option value="" selected>Select Role</option>
                    @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-2">
                <label> Select Shifts</label>
                <select wire:model="shift_id" class="form-control">
                    <option value="" selected>Select Shift</option>
                    @foreach($shifts as $shift)
                    <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>

    </form>


    <table class="table table-bordered table-striped">

        <thead>
            <tr class="bg-primary card-head-inverse">
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Designation</th>
                <th>Department</th>
                <th>Role</th>
                <th>Shift</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone_no}}</td>
                <td>{{$user->designation_name}}</td>
                <td>{{$user->department_name}}</td>
                <td>{{$user->role_name}}</td>
                <td>{{$user->name}}</td>
                <td>
                    @if($user->is_block == 1)
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Blocked</span>
                    @endif{{$user->is_block}}
                </td>
                <td>
                    <div class="btn-group">
                        @can('edit-users')
                        <a href="{{url('user/edit'.'/'.$user->id)}}" class="btn btn-sm btn-warning">Edit </a>
                        @endcan
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-right" style="float: right">
        {{ $users->links('livewire.livewire-pagination') }}
    </div>

</div>