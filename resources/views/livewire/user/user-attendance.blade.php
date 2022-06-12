<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">TODAY'S ACTIVITY</h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        </div>
        <div class="card-content collapse show">
            <div class="card-content">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="card">
                                <div class="card-body pb-0">
                                    <img src="{{asset('/images/user/ProfilePhoto/avatar-s-11.jpg')}}" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body pb-0">
                                    <h5 class="card-title">{{$user?->first_name}} {{$user?->middle_name}} {{$user?->last_name}}</h5>
                                    <p class="card-text">Designation: {{$user?->designation_name}} </p>
                                    <p class="card-text">Department: {{$user?->department_name}} </p>
                                    <p class="card-text">User Shift: {{$user_shift?->name}} </p>
                                    <p class="card-text"> <span>Role: {{$user?->role_name}}</span><span class="ml-1 mr-1">Phone#: {{$user->phone_no}}</span> <span>Address: {{$user->address. ', ' . $user->city . ' ' . $user->state . ' ' . $user->zip}}</span> </p>
                                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-text mt-3 mr-5" style="margin: auto;font-family: 'Open Sans Condensed', sans-serif;font-size: 64px;text-align: center;">
                                        <div wire:poll.keep-alive>
                                            {{ now()->format('H:i:s') }}
                                        </div>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body text-center">
                                    <h4 class="card-title mb-1">Working Hours</h4>
                                    @if(count($user_attendance) > 0)
                                    <span class="badge badge-pill bg-success">
                                        <h5 class="card-text " style="margin: auto;font-family: 'Open Sans Condensed', sans-serif;font-size: 30px;text-align: center;">
                                            {{Carbon\Carbon::parse($this->totalCheckInTime())->format('H:i:s')}}
                                        </h5>
                                    </span>
                                    @endif
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        @if($this->isCheckedIn() && !$this->isLogOut() && !$this->isBreakIn())
                                        <button wire:click="checkOut({{$this->user_attendance->first()->id}})" class="btn btn-lg btn-danger float-right">Check Out</button>
                                        @endif
                                        @if(!$this->isCheckedIn() )
                                        <button wire:click="checkIn" class="btn btn-lg btn-primary">Check In</button>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body text-center">
                                    <h4 class="card-title mb-1">Break Hours</h4>
                                    @if(count($user_attendance) > 0)
                                    <span class="badge badge-pill bg-warning">
                                        <h5 class="card-text " style="margin: auto;font-family: 'Open Sans Condensed', sans-serif;font-size: 30px;text-align: center;">
                                            {{Carbon\Carbon::parse($this->totalBreakTime())->format('H:i:s')}}
                                        </h5>
                                    </span>
                                    @endif
                                </div>
                                <ul class="list-group list-group-flush">
                                    @if($this->isCheckedIn() && !$this->isLogOut())
                                    <li class="list-group-item">
                                        @if(!$this->isBreakIn())
                                        <button wire:click="breakIn({{$user_attendance->first()->id}})" class="btn btn-lg btn-primary">Break In</button>
                                        @elseif($this->isBreakIn() && !$this->isBreakOut())
                                        <button wire:click="breakOut({{$user_breaks->first()->id}})" class="btn btn-lg btn-primary float-right">Break Out</button>
                                        @endif
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="list-group list-group-flush">
                            @foreach($user_attendance as $attendance)
                            @if($attendance->logout)
                            <li class="list-group-item">
                                <span class="badge badge-pill bg-info float-right">Duration: {{Carbon\Carbon::parse($attendance->duration)->format('H:i:s')}}</span>
                                <span class="badge badge-pill bg-danger float-right">To: {{Carbon\Carbon::parse($attendance->logout)->format('H:i')}}</span>
                                <span class="badge badge-pill bg-success float-right">From: {{Carbon\Carbon::parse($attendance->login)->format('H:i')}}</span>
                                Session: {{$loop->remaining+1}}
                                @if($loop->last)
                                <span class="text-danger">{{$attendance->is_late ? 'Late' : ''}}</span>
                                @endif

                            </li>
                            @else
                            <li class="list-group-item">
                                <span class="badge badge-pill bg-info float-right">Since: {{now()->diffAsCarbonInterval(Carbon\Carbon::parse($attendance->login) )->format('%H:%I:%S')}}</span>
                                <span class="badge badge-pill bg-success float-right">From: {{Carbon\Carbon::parse($attendance->login)->format('H:i')}}</span>
                                Session: {{$loop->remaining+1}} - Checked In
                                @if($loop->last)
                                @if($attendance->is_late)
                                <span class="text-danger">Late</span>
                                <a href="/users/approvals/create" class="btn btn-sm btn-outline-warning">Request Approval</a>

                                @endif
                                @endif
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <ul class="list-group list-group-flush">
                            @foreach($user_breaks as $break)
                            @if($break->break_out)
                            <li class="list-group-item">
                                <span class="badge badge-pill bg-info float-right">Duration: {{Carbon\Carbon::parse($break->duration)->format('H:i:s')}}</span>
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
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
