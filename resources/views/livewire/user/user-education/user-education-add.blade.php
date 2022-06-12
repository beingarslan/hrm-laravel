<div id="accordion">
    <div id="headingOne">
        <button  class="btn btn-primary float-right mb-1" data-toggle="collapse" data-target="#demo" aria-expanded="false"
                aria-controls="demo">Add Education
        </button>
    </div>

    <div class="collapse" id="demo" aria-labelledby="headingOne" data-parent="#accordion" wire:ignore.self>
        <div class="card card-body">

            <div class="row">
                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label">Degree Type</label>
                    <span class="danger">*</span>
                    @error('degree_type') <span class="danger">{{ $message }}</span> @enderror
                    <input type="text" class="form-control" wire:model="degree_type"
                           placeholder="Enter Your Degree Type" data-msg="Enter degree type"/>
                </div>

                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label">Degree</label>
                    <span class="danger">*</span>
                    @error('degree_name') <span class="danger">{{ $message }}</span> @enderror
                    <input type="text" class="form-control" wire:model="degree_name"
                           placeholder="Enter your Degree Name" data-msg="Enter Your Degree "/>
                </div>

                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label">Institute Name</label>
                    <span class="danger">*</span>
                    @error('institute_name') <span class="danger">{{ $message }}</span> @enderror
                    <input type="text" class="form-control" wire:model="institute_name"
                           placeholder="Enter Your Institute Name" data-msg="Please enter institute name"/>
                </div>

                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label">Grade/CGPA</label>
                    <span class="danger">*</span>
                    @error('grade') <span class="danger">{{ $message }}</span> @enderror
                    <input type="text" class="form-control" wire:model="grade" placeholder="Enter Your Grade "
                           data-msg="Please enter your grade"/>
                </div>

                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label">Start Date</label>
                    <span class="danger">*</span>
                    @error('from') <span class="danger">{{ $message }}</span> @enderror
                    <input type="date" class="form-control" wire:model="from" placeholder="yyyy-mm-dd"
                           data-msg="Please enter Your Degree's Start Date"/>
                </div>

                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label">End Date</label>
                    <span class="danger">*</span>
                    @error('to') <span class="danger">{{ $message }}</span> @enderror
                    <input type="date" class="form-control" wire:model="to" placeholder="yyyy-mm-dd"
                           data-msg="Please enter Your Degree's End Date"/>
                </div>


                <div class="col-12">
                    <button wire:click="addEducation" class="btn btn-primary">Save</button>
                </div>

            </div>
        </div>
    </div>
    <div class="collapse" id="demo1" aria-labelledby="headingTwo" data-parent="#accordion" wire:ignore.self>
        <div class="card card-body">

            <div class="row">
                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label">Degree Type</label>
                    <span class="danger">*</span>
                    @error('degree_type_e') <span class="danger">{{ $message }}</span> @enderror
                    <input type="text" class="form-control" wire:model="degree_type_e"
                           placeholder="Enter Your Degree Type" data-msg="Enter degree type"/>
                </div>

                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label">Degree</label>
                    <span class="danger">*</span>
                    @error('degree_name_e') <span class="danger">{{ $message }}</span> @enderror
                    <input type="text" class="form-control" wire:model="degree_name_e"/>
                </div>

                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label">Institute Name</label>
                    <span class="danger">*</span>
                    @error('institute_name_e') <span class="danger">{{ $message }}</span> @enderror
                    <input type="text" class="form-control" wire:model="institute_name_e"
                           placeholder="Enter Your Institute Name"/>
                </div>

                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label">Grade/CGPA</label>
                    <span class="danger">*</span>
                    @error('grade_e') <span class="danger">{{ $message }}</span> @enderror
                    <input type="text" class="form-control" wire:model="grade_e"
                           data-msg="Please enter your grade"/>
                </div>

                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label">Start Date</label>
                    <span class="danger">*</span>
                    @error('from_e') <span class="danger">{{ $message }}</span> @enderror
                    <input type="date" value="{{$from_e}}" class="form-control" wire:model="from_e"
                           data-msg="Please enter Your Degree's Start Date"/>
                </div>

                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label">End Date</label>
                    <span class="danger">*</span>
                    @error('to_e') <span class="danger">{{ $message }}</span> @enderror
                    <input type="date" class="form-control" value="{{$to_e}}" wire:model="to_e"
                           data-msg="Please enter Your Degree's End Date"/>
                </div>
                <div class="col-12">
                    <button wire:click="validateData" class="btn btn-primary"
                            data-toggle="collapse" data-target="#demo1" aria-expanded="false"
                            aria-controls="collapseExample"
                    >Update</button>
                </div>
            </div>
        </div>
    </div>



    <table class="table table-bordered table-striped">
        <thead>
        <tr class="bg-primary card-head-inverse">
            <th>Name</th>
            <th>Grade/CGPA</th>
            <th>Institute</th>
            <th>Degree Type</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        @forelse($educations as $education)
            <tr>
                <td>{{$education->name}}</td>
                <td>{{$education->grade}}</td>
                <td>{{$education->institute}}</td>
                <td>{{$education->degree_type}}</td>
                <td>{{ Carbon\Carbon::parse($education->from)->format('d M Y')}}</td>
                <td>{{ Carbon\Carbon::parse($education->to)->format('d M Y')}}</td>
                <td>
                    <div class="btn-group">
                        <li>
                            <button wire:click="edit({{ $education->id }})" class="btn btn-primary collapsed" data-toggle="collapse" data-target="#demo1" aria-expanded="false"
                                    aria-controls="demo1" style="padding: 2px 15px;">Edit
                            </button>
                        </li>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-center" colspan="7">No Data Found</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
