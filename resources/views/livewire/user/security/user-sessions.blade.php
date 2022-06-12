<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Login Activity</h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li>
                        <a data-action="collapse"><i class="feather icon-minus"></i></a>
                    </li>
                    <li>
                        <a data-action="reload"><i class="feather icon-rotate-cw"></i></a>
                    </li>
                    <li>
                        <a data-action="expand"><i class="feather icon-maximize"></i></a>
                    </li>
                    <li>
                        <a data-action="close"><i class="feather icon-x"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-content collapse show">
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-xl mb-0">
                        <thead>
                            <tr>
                                <th>Device</th>
                                <th>IP</th>
                                <th>Last Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($devices as $device)
                            <tr>
                                <td>
                                    {{$device->user_agent}}
                                </td>
                                <td>
                                    {{$device->ip_address}}
                                    <!-- if session id same current  -->
                                    @if(Session::getId() == $device->id)
                                    | <span class="text-success">current device</span>
                                    @endif
                                </td>
                                <td>

                                    {{Carbon\Carbon::parse($device->last_activity)->diffForHumans()}}
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <div class="form-group">
                            <button wire:click="validateData" class="btn btn-danger">
                                {{ __('Logout from all other devices!') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
