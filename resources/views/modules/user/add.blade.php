@extends('layouts.default')

@include('includes.user.add-user.add-user-css')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">User Registration form</h4>
            </div>
            <div class="card-content">
                <div class="card">
                    <div class="border-bottom-primary"> </div>
                    <div class="card-body py-2 my-25">
                        <form class="validate-form mt-2 pt-50" action="{{ route('user.new-registration')}}" method="post">
                            @csrf

                            <div class="row">

                                <div class="col-12 col-sm-4 mb-1">
                                    <label class="form-label">
                                        First Name
                                        <span class="danger">*</span>
                                        @error('first_name') <span class="danger">{{ $message }}</span> @enderror
                                    </label>
                                    <input type="text" class="form-control" name="first_name" placeholder="Enter your first name" value="{{old('first_name')}}" />
                                </div>

                                <div class="col-12 col-sm-4 mb-1">
                                    <label class="form-label"> 
                                        Last Name 
                                        <span class="danger">*</span> 
                                        @error('last_name') <span class="danger">{{ $message }}</span> @enderror 
                                    </label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Enter your last name" value="{{old('last_name')}}" />
                                </div>

                                <div class="col-4 col-md-4 col-sm-4 mb-1">
                                    <label class="form-label"> 
                                        Email 
                                        <span class="danger">*</span> 
                                        @error('email') <span class="danger">{{ $message }}</span> @enderror 
                                    </label>
                                    <input type="text" class="form-control" name="email" placeholder="Enter your email" value="{{old('email')}}" />
                                </div>

                                <div class="col-4 col-md-4 col-sm-4 mb-1">
                                    <label class="form-label"> 
                                        Phone no <span class="danger">*</span> 
                                        @error('phone_no') <span class="danger">{{ $message }}</span> @enderror </label>
                                    <input type="text" class="form-control" name="phone_no" placeholder="Enter your phone no" value="{{old('phone_no')}}" />
                                </div>

                                <div class="col-4 col-md-4 col-sm-4 mb-1">
                                    <label class="form-label"> Date of Birth <span class="danger">*</span> @error('date_of_birth') <span class="danger">{{ $message }}</span> @enderror </label>
                                    <input type="date" class="form-control" name="date_of_birth" placeholder="Enter your date of birth" value="{{old('date_of_birth')}}" />
                                </div>

                                <div class="col-4 col-md-4 col-sm-4 mb-1">
                                    <label class="form-label"> Address <span class="danger">*</span> @error('address') <span class="danger">{{ $message }}</span> @enderror </label>
                                    <input type="text" class="form-control" name="address" placeholder="Enter your address" value="{{old('address')}}" />
                                </div>

                                <div class="col-4 col-md-4 col-sm-4 mb-1">
                                    <label class="form-label">Gender <span class="danger">*</span> @error('gender') <span class="danger">{{ $message }}</span> @enderror</label>
                                    <select class="form-control" name="gender">
                                        <option value="">Select Gender</option>
                                        <option value="1" {{ (old("gender") == 1 ? "selected":"") }}>Male</option>
                                        <option value="2" {{ (old("gender") == 2 ? "selected":"") }}>Female</option>
                                        <option value="3" {{ (old("gender") == 3 ? "selected":"") }}>Other</option>
                                    </select>
                                </div>

                                <div class="col-4 col-md-4 col-sm-4 mb-1">
                                    <label class="form-label" for="accountZipCode">Designation <span class="danger">*</span> @error('designation_id') <span class="danger">{{ $message }}</span> @enderror </label>
                                    <select class="form-control" name="designation_id">
                                        <option value="">Select Designation</option>
                                        @foreach ($designations as $obj)
                                        <option value="{{$obj->id}}" {{ (old("designation_id") == $obj->id ? "selected":"") }}>{{$obj->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-4 col-md-4 col-sm-4 mb-1">
                                    <label class="form-label">Department <span class="danger">*</span> @error('department_id') <span class="danger">{{ $message }}</span> @enderror </label>
                                    <select class="form-control" name="department_id">
                                        <option value="">Select option</option>
                                        @foreach ($departments as $obj)
                                        <option value="{{$obj->id}}" {{ (old("department_id") == $obj->id ? "selected":"") }}>{{$obj->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-4 col-md-4 col-sm-4 ">
                                    <fieldset class="form-group">
                                        <label>Select Role <span class="danger">*</span> @error('role') <span class="danger">{{ $message }}</span> @enderror </label>
                                        <select class="form-control" name="role">
                                            <option value="">Select option</option>
                                            @foreach ($roles as $role)
                                            <option value="{{$role}}" {{ (old("role") == $role ? "selected":"") }}>{{$role}}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-4 col-md-4 col-sm-4 ">
                                    <fieldset class="form-group">
                                        <label>Select Shift <span class="danger">*</span> @error('shift_time_id') <span class="danger">{{ $message }}</span> @enderror </label>
                                        <select class="form-control" name="shift_time_id">
                                            <option value="">Select option</option>
                                            @foreach ($shiftTimings as $shiftTime)
                                            <option value="{{$shiftTime->id}}" {{ (old("shift_time_id") ==$shiftTime->id ? "selected":"") }}>{{$shiftTime->name}}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>


                                <div class="col-4 col-md-4 col-sm-4 ">
                                    <fieldset class="form-group">
                                        <label>Select Teams <small class="text-primary">(Can Select multiple)</small>
                                            <span class="danger">*</span> @error('team_ids') <span class="danger">{{ $message }}</span> @enderror </label>
                                        <select class="select2 form-control" multiple="multiple" name="team_ids[]">
                                            @foreach ($teams as $obj)
                                            <option value="{{$obj->id}}" {{ (collect(old('team_ids'))->contains($obj->id)) ? 'selected':'' }}>{{$obj->name}}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-4 col-md-4 col-sm-4 mb-1">
                                    <label class="form-label"> Date of Joining <span class="danger">*</span> @error('date_of_joining') <span class="danger">{{ $message }}</span> @enderror </label>
                                    <input type="date" class="form-control" name="date_of_joining" placeholder="" value="{{old('date_of_joining')}}" />
                                </div>

                                <div class="col-4 col-md-4 col-sm-4 mb-1">
                                    <label class="form-label"> Probation end Date <span class="danger">*</span> @error('date_of_probation_end') <span class="danger">{{ $message }}</span> @enderror </label>
                                    <input type="date" class="form-control" name="date_of_probation_end" placeholder="" value="{{old('date_of_probation_end')}}" />
                                </div>

                                <div class="col-4 col-md-4 col-sm-4 mb-1">
                                    <label class="form-label"> Employee ID <span class="danger">*</span> @error('employee_id') <span class="danger">{{ $message }}</span> @enderror </label>
                                    <input type="text" class="form-control" name="employee_id" placeholder="Employee ID" value="{{old('employee_id')}}" />
                                </div>

                                <div class="col-4 col-md-4 col-sm-4 mb-1">
                                    <label class="form-label"> CNIC <span class="danger">*</span> @error('cnic') <span class="danger">{{ $message }}</span> @enderror </label>
                                    <input type="text" class="form-control" name="cnic" placeholder="CNIC" value="{{old('cnic')}}" />
                                </div>

                                <div class="col-4 col-md-4 col-sm-4 mb-1">
                                    <label class="form-label" for="accountZipCode">Supervisor ID <span class="danger">*</span> @error('supervisor_id') <span class="danger">{{ $message }}</span> @enderror </label>
                                    <select class="form-control" name="supervisor_id">
                                        <option value="">Select option</option>
                                        @foreach ($supervisors as $obj)
                                        <option value="{{$obj->id}}" {{ (old("supervisor_id") == $obj->id ? "selected":"") }}>{{$obj->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Register & Go to Update </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@include('includes.user.add-user.add-user-js')