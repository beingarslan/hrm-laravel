<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Remove Account</h4>
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

                Your all data will be removed from our database.
                <div class="row mt-2">
                    <div class="col-12">
                        <div class="form-group">
                            <button wire:click="validateData" class="btn btn-danger">
                                {{ __('Delete Account Permanently') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

