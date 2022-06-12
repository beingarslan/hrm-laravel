<div id="accordion">
    <div id="headingOne">
        <button  class="btn btn-primary float-right mb-1" data-toggle="collapse" data-target="#demo" aria-expanded="false"
                 aria-controls="demo">Add Skill
        </button>
    </div>

    <div class="collapse" id="demo" aria-labelledby="headingOne" data-parent="#accordion" wire:ignore.self>
        <div class="card card-body">

            <div class="row">
                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label">Skill name</label>
                    <span class="danger">*</span>
                    @error('skill') <span class="danger">{{ $message }}</span> @enderror
                    <input type="text" class="form-control" wire:model="skill"
                           placeholder="Enter Your Skill Name" data-msg="Enter Skill Name"/>
                </div>

                <div class="col-md-12">
                    <label class="form-label">
                        Description
                        <span class="danger">*</span>
                        @error('description') <span
                                class="danger">{{ $message }}</span> @enderror
                    </label>
                    <textarea rows = "10" class="form-control"  wire:model="description" placeholder="Enter your Skill's Description" ></textarea>
                </div>


                <div class="col-12 mt-1">
                    <button wire:click="addSkill" class="btn btn-primary">Save</button>
                </div>

            </div>
        </div>
    </div>

    <div class="collapse" id="demo1" aria-labelledby="headingTwo" data-parent="#accordion" wire:ignore.self>
        <div class="card card-body">

            <div class="row">
                <div class="col-4 col-md-4 col-sm-4 mb-1">
                    <label class="form-label">Skill name</label>
                    <span class="danger">*</span>
                    @error('skill_e') <span class="danger">{{ $message }}</span> @enderror
                    <input type="text" class="form-control" wire:model="skill_e"
                           data-msg="Enter Skill's name"/>
                </div>
                <div class="col-md-12">
                    <label class="form-label">
                        Description
                        <span class="danger">*</span>
                        @error('description_e') <span
                                class="danger">{{ $message }}</span> @enderror
                    </label>
                    <textarea rows = "10" class="form-control"  wire:model="description_e" placeholder="Enter your Skill's Description" ></textarea>
                </div>
                <div class="col-12 mt-1">
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
            <th>Skill</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        @forelse($skills as $skill)
            <tr>
                <td>{{$skill->skill}}</td>
                <td>{{$skill->description}}</td>
                <td>
                    <div class="btn-group">
                        <li id="headingTwo">
                            <button wire:click="edit({{ $skill->id }})" class="btn btn-primary collapsed" data-toggle="collapse" data-target="#demo1" aria-expanded="false"
                                    aria-controls="demo1" style="padding: 2px 15px;">Edit
                            </button>
                            <button wire:click="delete({{ $skill->id }})" class="btn btn-primary collapsed" style="padding: 2px 15px;">Delete</button>
                        </li>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-center" colspan="3">No Skills</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

