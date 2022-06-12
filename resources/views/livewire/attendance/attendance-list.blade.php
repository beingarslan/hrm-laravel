<div class="table-responsive">
    <form class="form" wire:submit.prevent="filterUserList" style="margin-top: 20px;">
        <div class="form-group col-md-12 d-flex">

            <div class="form-group col-md-3">
                <label>Name</label>
                <input type="text" class="form-control" wire:model="full_name" placeholder="Search with name">
            </div>

            <div class="form-group col-md-2">
                <label>Date</label>
                <input type="date" class="form-control" wire:model="attendance_date" placeholder="Search with date">
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

            <div class="form-group col-md-3">
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
                <th>Date</th>
                <th>Login</th>
                <th>Logout</th>
                <th>Duration</th>
                <th>Late</th>
                <th>Approved</th>
                <th>Employee ID</th>
                <th>Email</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Shift</th>
                <th>Teams</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
            <tr>
                <td>{{$attendance->first_name . ' ' . $attendance->middle_name . ' ' . $attendance->last_name}}</td>
                <td>{{$attendance->attendance_date}}</td>
                <td>{{$attendance->first_login}}</td>
                <td>{{$attendance->last_logout}}</td>
                <td>{{Carbon\Carbon::parse((int)$attendance->duration)->format('H:i:s')}}</td>
                <td>
                    @if($attendance->is_late == 1)
                    <span class="badge badge-success">Yes</span>
                    @else
                    <span class="badge badge-danger">No</span>
                    @endif
                </td>
                <td>
                    @if($attendance->is_approved == 1)
                    <span class="badge badge-success">Yes</span>
                    @else
                    <span class="badge badge-danger">No</span>
                    @endif
                </td>
                <td>{{$attendance->employee_id}}</td>
                <td>{{$attendance->email}}</td>
                <td>{{$attendance->department_name}}</td>
                <td>{{$attendance->designation_name}}</td>
                <td>{{$attendance->shift_time_name}}</td>
                <td>
                    @foreach(explode(',' , $attendance->team_names) as $team_name)
                    <span class="badge badge-primary">{{$team_name}}</span>
                    @endforeach
                </td>
                <td>
                    <div class="btn-group">
                        <button wire:click="viewSessions({{$attendance->user_id}}, '{{$attendance->attendance_date}}')" class="btn btn-sm btn-success">Sessions</button>
                        <button wire:click="viewBreaks({{$attendance->user_id}}, '{{$attendance->attendance_date}}')" class="btn btn-sm btn-warning">Breaks</button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-right" style="float: right">
        {{ $attendances->links('livewire.livewire-pagination') }}
    </div>
    <!-- Sessions -->
    <div class="modal fade" id="model-sessions" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Attendance Sessions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @php $i=count($sessions); @endphp
                    @forelse($sessions as $session)
                    @if($session->logout)
                    <li class="list-group-item">
                        <span class="badge badge-pill bg-info float-right">Duration: {{Carbon\Carbon::parse((int)$session->duration)->format('H:i:s')}}</span>
                        <span class="badge badge-pill bg-danger float-right">To: {{Carbon\Carbon::parse($session->logout)->format('H:i')}}</span>
                        <span class="badge badge-pill bg-success float-right">From: {{Carbon\Carbon::parse($session->login)->format('H:i')}}</span>
                        Session: {{$loop->remaining+1}}
                        @if($loop->last)
                        <span class="text-danger">{{$session->is_late ? 'Late' : ''}}</span>
                        @endif
                    </li>
                    @else
                    <li class="list-group-item">
                        <span class="badge badge-pill bg-info float-right">Since: {{now()->diffAsCarbonInterval(Carbon\Carbon::parse($session->login) )->format('%H:%I:%S')}}</span>
                        <span class="badge badge-pill bg-success float-right">From: {{Carbon\Carbon::parse($session->login)->format('H:i')}}</span>
                        Session: {{$loop->remaining+1}} - Checked In
                        @if($loop->last)
                        <span class="text-danger">{{$session->is_late ? 'Late' : ''}}</span>
                        @endif
                    </li>
                    @endif
                    @empty
                    <p>No record found.</p>
                    @endforelse
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Sessions End -->
    <!-- Breaks -->
    <div class="modal fade" id="model-breaks" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Breaks</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @php $i=count($breaks); @endphp

                    @forelse($breaks as $break)
                    @if($break->break_out)
                    <li class="list-group-item">
                        <span class="badge badge-pill bg-info float-right">Duration: {{Carbon\Carbon::parse((int)$break->duration)->format('H:i:s')}}</span>
                        <span class="badge badge-pill bg-danger float-right">To: {{Carbon\Carbon::parse($break->break_out)->format('H:i')}}</span>
                        <span class="badge badge-pill bg-success float-right">From: {{Carbon\Carbon::parse($break->break_in)->format('H:i')}}</span>
                        Session: {{$loop->remaining+1}}
                    </li>
                    @else
                    <li class="list-group-item">
                        <span class="badge badge-pill bg-info float-right">Since: {{now()->diffAsCarbonInterval(Carbon\Carbon::parse($break->break_in))->format('%H:%I:%S')}}</span>
                        <span class="badge badge-pill bg-success float-right">From: {{Carbon\Carbon::parse($break->break_in)->format('H:i')}}</span>
                        Session: {{$loop->remaining+1}} - Break In
                    </li>
                    @endif
                    @empty
                    <p>No record found.</p>
                    @endforelse
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaks End -->
</div>
@push('scripts')
<script>
    document.addEventListener('model:sessions', function() {
        var session = event.detail.data['sessions'];
        console.log(session);
        $('#model-sessions').modal('show');
    });
    document.addEventListener('model:breaks', function() {
        var breaks = event.detail.data['breaks'];
        console.log(breaks);
        $('#model-breaks').modal('show');
    });
</script>

@endpush