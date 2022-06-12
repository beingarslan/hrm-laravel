<div id="accordion">
    <div id="headingOne">
        <button class="btn btn-primary float-right mb-1" data-toggle="collapse" data-target="#demo" aria-expanded="false" aria-controls="demo">Add Experience
        </button>
    </div>

    <div class="collapse" id="demo" aria-labelledby="headingOne" data-parent="#accordion" wire:ignore.self>
        <div class="card card-body">

            <div class="row">
                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label">Company Name</label>
                    <span class="danger">*</span>
                    @error('company_name') <span class="danger">{{ $message }}</span> @enderror
                    <input type="text" class="form-control" wire:model="company_name" placeholder="Enter Your Company Name" data-msg="Enter Company Name" />
                </div>

                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label">Designation</label>
                    <span class="danger">*</span>
                    @error('designation') <span class="danger">{{ $message }}</span> @enderror
                    <input type="text" class="form-control" wire:model="designation" placeholder="Enter your designation" data-msg="Enter Your Designation " />
                </div>

                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label">Start Date</label>
                    <span class="danger">*</span>
                    @error('from') <span class="danger">{{ $message }}</span> @enderror
                    <input type="date" class="form-control" wire:model="from" placeholder="yyyy-mm-dd" data-msg="Please enter Your Job's Start Date" />
                </div>

                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label">End Date</label>
                    <span class="danger">*</span>
                    @error('to') <span class="danger">{{ $message }}</span> @enderror
                    <input type="date" class="form-control" wire:model="to" placeholder="yyyy-mm-dd" data-msg="Please enter Your Job's End Date" />
                </div>

                <div class="col-md-12">
                    <label class="form-label">
                        Description
                        <span class="danger">*</span>
                        @error('description') <span class="danger">{{ $message }}</span> @enderror
                    </label>
                    <textarea rows="10" class="form-control" wire:model="description" placeholder="Enter your Job's Description"></textarea>
                </div>


                <div class="col-12 mt-1">
                    <button wire:click="addExperience" class="btn btn-primary">Save</button>
                </div>

            </div>
        </div>
    </div>

    <div class="collapse" id="demo1" aria-labelledby="headingTwo" data-parent="#accordion" wire:ignore.self>
        <div class="card card-body">

            <div class="row">
                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label">Company name</label>
                    <span class="danger">*</span>
                    @error('company_name_e') <span class="danger">{{ $message }}</span> @enderror
                    <input type="text" class="form-control" wire:model="company_name_e" data-msg="Enter Company's name" />
                </div>

                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label">Designation</label>
                    <span class="danger">*</span>
                    @error('designation_e') <span class="danger">{{ $message }}</span> @enderror
                    <input type="text" class="form-control" wire:model="designation_e" />
                </div>


                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label">Start Date</label>
                    <span class="danger">*</span>
                    @error('from_e') <span class="danger">{{ $message }}</span> @enderror
                    <input type="date" value="{{$from_e}}" class="form-control" wire:model="from_e" data-msg="Please enter Your job's Start Date" />
                </div>

                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label">End Date</label>
                    <span class="danger">*</span>
                    @error('to_e') <span class="danger">{{ $message }}</span> @enderror
                    <input type="date" class="form-control" value="{{$to_e}}" wire:model="to_e" data-msg="Please enter Your job's End Date" />
                </div>

                <div class="col-md-12">
                    <label class="form-label">
                        Description
                        <span class="danger">*</span>
                        @error('description_e') <span class="danger">{{ $message }}</span> @enderror
                    </label>
                    <textarea rows="10" class="form-control" wire:model="description_e" placeholder="Enter your Job's Description"></textarea>
                </div>
                <div class="col-12 mt-1">
                    <button wire:click="validateData" class="btn btn-primary" data-toggle="collapse" data-target="#demo1" aria-expanded="false" aria-controls="collapseExample">Update</button>
                </div>
            </div>
        </div>
    </div>



    <table class="table table-bordered table-striped">
        <thead>
            <tr class="bg-primary card-head-inverse">
                <th>Company</th>
                <th>Designation</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($experiences as $experience)
            <tr>
                <td>{{$experience->company}}</td>
                <td>{{$experience->designation}}</td>
                <td>{{$experience->description}}</td>
                <td>{{ Carbon\Carbon::parse($experience->from)->format('d M Y')}}</td>
                <td>{{ Carbon\Carbon::parse($experience->to)->format('d M Y')}}</td>
                <td>
                    <div class="btn-group">
                        @can('edit-users-experience-details')
                        <li id="headingTwo">
                            <button wire:click="edit({{ $experience->id }})" class="btn btn-primary collapsed" data-toggle="collapse" data-target="#demo1" aria-expanded="false" aria-controls="demo1" style="padding: 2px 15px;">Edit
                            </button>
                        </li>
                        @endcan
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No Experience Found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>