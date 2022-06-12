<table class="table table-bordered table-striped">
    <thead>
    <tr class="bg-primary card-head-inverse">
        <th>Name</th>
        <th>Total</th>
        <th>Consumed</th>
        <th>Remaining</th>
    </tr>
    </thead>

    <tbody>
    @forelse($leaveTypes as $leaveType)
        <tr>
            <td>{{$leaveType->leaveType->name}}</td>
            <td>{{$leaveType->leaveType->total}}</td>
            <td>{{$leaveType->consumed}}</td>
            <td>{{$leaveType->leaveType->total - $leaveType->consumed}}</td>

        </tr>
    @empty
        <tr>
            <td colspan="6" class="text-center">No Leaves Found</td>
        </tr>
    @endforelse
    </tbody>
</table>

<table class="table table-bordered table-striped">
    <thead>
    <tr class="bg-primary card-head-inverse">
        <th>Leave Type</th>
        <th>Start Date</th>
        <th>End Date</th>
    </tr>
    </thead>

    <tbody>
    @forelse($leaves as $leave)
        <tr>
            <td>{{$leave->leaveType->name}}</td>
            <td>{{ Carbon\Carbon::parse($leave->start_date)->format('d M Y')}}</td>
            <td>{{ Carbon\Carbon::parse($leave->end_date)->format('d M Y')}}</td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="text-center">No Leaves Found</td>
        </tr>
    @endforelse
    </tbody>
</table>

