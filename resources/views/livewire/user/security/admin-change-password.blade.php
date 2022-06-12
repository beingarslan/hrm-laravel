<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Update Password</h4>
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

                    <div class="col-12">
                        <div class="form-group">
                            <div class="controls">
                                <label for="password">{{ __('New Password') }}</label>
                                <input id="password" type="password" class=" form-control block w-full" wire:model="password" autocomplete="new-password" />
                                @error('password') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">

                            <div class="controls">
                                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                <input id="password_confirmation" type="password" class=" form-control block w-full" wire:model="password_confirmation" autocomplete="new-password" />
                                @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <button wire:click="validateData" class="btn btn-primary">
                                {{ __('Update Password') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


