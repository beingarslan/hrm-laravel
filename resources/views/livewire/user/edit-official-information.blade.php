    <div class="card-body">
        <form class="validate-form mt-0 pt-0" wire:submit.prevent="save">
            <div class="row">

                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label"> Date of Joining <span class="danger">*</span> @error('date_of_joining') <span class="danger">{{ $message }}</span> @enderror </label>
                    <input type="date" class="form-control" wire:model="date_of_joining" placeholder="" value="{{old('date_of_joining')}}" />
                </div>

                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label"> Probation end Date <span class="danger">*</span> @error('date_of_probation_end') <span class="danger">{{ $message }}</span> @enderror </label>
                    <input type="date" class="form-control" wire:model="date_of_probation_end" placeholder="" value="{{old('date_of_probation_end')}}" />
                </div>

                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label"> Employee ID <span class="danger">*</span> @error('employee_id') <span class="danger">{{ $message }}</span> @enderror </label>
                    <input type="text" class="form-control" wire:model="employee_id" placeholder="Probation end Date" value="{{old('employee_id')}}" />
                </div>

                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label" for="accountZipCode">Designation</label>
                    <select class="form-control" name="designation_id" id="basicSelect" wire:model="designation_id">
                        <option disabled>Select</option>designations
                        @foreach ($designations as $designation)
                        <option value="{{$designation->id}}" {{ $user->designation_id == $designation->id ? 'selected' : '' }}>{{$designation->name}}</option>
                        @endforeach
                    </select>
                    @error('designation_id') <span class="danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label" for="accountZipCodex">Supervisor</label>
                    <select class="form-control" id="accountZipCodex" name="supervisor_id" wire:model="supervisor_id">
                        @foreach ($supervisors as $supervisor_value)
                        <option value="{{$supervisor_value->id}}" {{ $user->supervisor_id == $supervisor_value->id ? 'selected' : '' }}>{{$supervisor_value->first_name}}</option>
                        @endforeach
                    </select>
                    @error('supervisor_id') <span class="danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label" for="accountZipCode">Department </label>
                    <select class="form-control" name="department_id" id="basicSelect" wire:model="department_id">
                        <option disabled>Select</option>
                        @foreach ($departments as $department)
                        <option value="{{$department->id}}" {{ $user->department_id==$department->id ? 'selected' : '' }}>{{$department->name}}</option>
                        @endforeach
                    </select>
                    @error('department_id') <span class="danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label" for="accountZipCode">Role</label>
                    <select class="form-control" name="role" id="basicSelect" wire:change="changeRoleEvent($event.target.value)" >
                        <option disabled>Select</option>
                        @foreach ($roles as $role)
                        <option value="{{$role}}" {{ $user_role == $role ? 'selected' : '' }}>{{$role}}</option>
                        @endforeach
                    </select>
                    @error('user_role') <span class="danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label" for="shift">Shift </label>
                    <select class="form-control" name="shift_time" id="basicSelect" wire:model="shift_time_id">
                        <option disabled>Select</option>
                        @foreach ($shift_timings as $shift_timing)
                        <option value="{{$shift_timing->id}}" {{ $user->shift_time_id==$shift_timing->id ? 'selected' : '' }}>{{$shift_timing->name}}</option>
                        @endforeach
                    </select>
                    @error('shift_time_id') <span class="danger">{{ $message }}</span> @enderror
                </div>

                {{-- Teams --}}
                <div class="col-4 col-md-4 col-sm-4 mb-1" wire:ignore>
                    <label class="form-label" for="accountZipCode">Team</label>
                    <select class="form-control " wire:model="select_teams" multiple="" tabindex="-1" aria-hidden="false" name="teams" style="width:100%" id="userteamsids">
                        <option disabled>Select Teams</option>
                        @foreach ($team_selections as $team_selection)
                        <option value="{{$team_selection->id}}" {{$team_selection->select ? 'selected' : ''}}>{{$team_selection->name}}</option>
                        @endforeach
                    </select>
                    @error('team_selections') <span class="danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary mt-1 me-1">Update official Information</button>
                </div>

            </div>
        </form>
    </div>

    @push('edit-official-infor-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('#userteamsids').select2({
                placeholder: 'Select Teams'
            });
            @this.set('select_teams', {{ $user->teams->pluck('id') }});
            $('#userteamsids').val({{ $user->teams?->pluck('id')}}).trigger('change');

            $('#userteamsids').on('change', function(e) {
                // console.log($(this).val());
                let data = $(this).val();
                @this.set('select_teams', data);
                console.log(data);
            });
            window.livewire.on('save', () => {
                $('#userteamsids').select2();
            });
        });
    </script>

    @endpush