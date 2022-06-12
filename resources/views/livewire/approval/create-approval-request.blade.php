<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Request</h4>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-content collapse show">
                <div class="card-body">
                    <form action="{{route('users.approvals.save')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Request Type</label>
                            <span class="danger">*</span>
                            <select class="form-control" name="request_type" id="request_type"
                                    wire:change="checkRequestType($event.target.value)">
                                <option selected value="" disabled>Select Request Type</option>
                                @foreach($approvalTypes as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- leaveTypes -->
                        @if ($check)
                            <div class="row">
                                <div class="col-4 col-md-4 col-sm-4 mb-1">
                                    <label for="title">Leave Type</label>
                                    <span class="danger">*</span>
                                    <select class="form-control" name="leave_type" id="">
                                        <option selected value="" disabled>Select Leave Type</option>
                                        @foreach($leaveTypes as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4 col-md-4 col-sm-4 mb-1">
                                    <label class="form-label">Start Date</label>
                                    <span class="danger">*</span>
                                    @error('from') <span class="danger">{{ $message }}</span> @enderror
                                    <input type="date"  placeholder="yyyy-mm-dd" name="from" class="form-control"
                                           data-msg="Please enter Start Date"/>
                                </div>
                                <div class="col-4 col-md-4 col-sm-4 mb-1">
                                    <label class="form-label">End Date</label>
                                    <span class="danger">*</span>
                                    @error('to') <span class="danger">{{ $message }}</span> @enderror
                                    <input type="date"  placeholder="yyyy-mm-dd" name="to" class="form-control"                                           data-msg="Please enter End Date"/>
                                </div>
                            </div>
                                @endif
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <span class="danger">*</span>
                                    <input type="text" placeholder="Subject" name="title" class="form-control">
                                </div>
                                <div class="form-group" wire:ignore>
                                    <label for="title">Details</label>
                                    <span class="danger">*</span>
                                    <textarea rows="10" name="comment" placeholder="Details" id="editor"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
