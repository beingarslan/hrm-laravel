<div class="card-body">

    <form class="validate-form" wire:submit.prevent="UpdatePersonalInformation">

        <div class="row">

            <div class="col-12 col-sm-4 mb-1 form-group">
                <label class="form-label" for="accountFirstName">First Name</label>
                <input type="text" class="form-control" wire:model="first_name" placeholder="First Name" />
                @error('first_name') <span class="danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-12 col-sm-4 mb-1">
                <label class="form-label" for="accountFirstName">Middle Name</label>
                <input type="text" class="form-control" wire:model="middle_name" id="accountFirstName" placeholder="Middle Name" data-msg="Please enter first name" />
                @error('middle_name') <span class="danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-12 col-sm-4 mb-1">
                <label class="form-label" for="accountFirstName">Last Name</label>
                <input type="text" class="form-control" wire:model="last_name" id="accountFirstName" placeholder="Last Name" data-msg="Please enter first name" />
                @error('last_name') <span class="danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-4 col-md-4 col-sm-4 mb-1">
                <label class="form-label" for="accountPhoneNumber">Phone Number</label>
                <input type="text" class="form-control account-number-mask" wire:model="phone_no" id="accountPhoneNumber" placeholder="Phone Number" />
                @error('phone_no') <span class="danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-4 col-md-4 col-sm-4 mb-1">
                <label class="form-label" for="accountPhoneNumber">Date of Birth</label>
                <input type="date" class="form-control" id="accountPhoneNumber" wire:model="date_of_birth" placeholder="Phone Number" />
                @error('date_of_birth') <span class="danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-4 col-md-4 col-sm-4 mb-1">
                <label class="form-label">Gender</label>
                <select class="form-control" id="basicSelect" wire:model="gender">
                    <option>Select Gender</option>
                    <option value="1" {{ $gender=="1" ? 'selected' : ''}}> Male</option>
                    <option value="2" {{ $gender=="2" ? 'selected' : ''}}>Female</option>
                    <option value="3" {{ $gender=="3" ? 'selected' : ''}}>Other</option>
                </select>
                @error('gender') <span class="danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-4 col-md-4 col-sm-4 mb-1">
                <label class="form-label" for="accountAddress">Address</label>
                <input type="text" class="form-control" id="accountAddress" wire:model="address" />
                @error('address') <span class="danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-4 col-md-4 col-sm-4 mb-1">
                <label class="form-label" for="accountZipCode">Map Address </label>
                <input type="text" class="form-control account-zip-code" id="accountZipCode" wire:model="map_address" placeholder="Map Address" />
                @error('map_address') <span class="danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-4 col-md-4 col-sm-4 mb-1">
                <label class="form-label" for="accountState">City</label>
                <input type="text" class="form-control" id="accountState" placeholder="City" wire:model="city" />
                @error('city') <span class="danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-4 col-md-4 col-sm-4 mb-1">
                <label class="form-label" for="accountState">State</label>
                <input type="text" class="form-control" id="accountState" placeholder="State" wire:model="state" />
                @error('state') <span class="danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-4 col-md-4 col-sm-4 mb-1">
                <label class="form-label" for="accountZipCode">Zip </label>
                <input type="text" class="form-control account-zip-code" id="accountZipCode" wire:model="zip" placeholder="Zip Code" maxlength="6" />
                @error('zip') <span class="danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-4 col-md-4 col-sm-4 mb-1">
                <label class="form-label" for="accountZipCode">Latitude </label>
                <input type="text" class="form-control account-zip-code" id="accountZipCode" wire:model="lat" placeholder="Latitude" maxlength="6" />
                @error('lat') <span class="danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-4 col-md-4 col-sm-4 mb-1">
                <label class="form-label" for="accountZipCode">Longitude </label>
                <input type="text" class="form-control account-zip-code" id="accountZipCode" wire:model="lng" placeholder="Longitude" maxlength="6" />
                @error('lng') <span class="danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-4 col-md-4 col-sm-4 mb-1">
                <label class="form-label"> CNIC <span class="danger">*</span> @error('cnic') <span class="danger">{{ $message }}</span> @enderror </label>
                <input type="text" class="form-control" wire:model="cnic" placeholder="CNIC" value="{{old('cnic')}}" />
            </div>

            <div class="col-4 col-md-4 col-sm-4 mb-1">
                <label class="form-label" for="accountEmail">Email</label>
                <input type="email" class="form-control" id="accountEmail" placeholder="Email" wire:model="email" readonly />
                @error('email') <span class="danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-4 col-md-4 col-sm-4 mb-1">
                <label class="form-label" for="accountZipCode">Phone Verified</label>
                <input type="text" class="form-control account-zip-code" id="accountZipCode" placeholder="Phone Verified" wire:model="phone_verified" maxlength="6" readonly />
                @error('phone_verified') <span class="danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-4 col-md-4 col-sm-4 mb-1">
                <label class="form-label" for="accountZipCode">Email Verified </label>
                <input type="text" class="form-control account-zip-code" id="accountZipCode" placeholder="Email Verified" wire:model="email_verified" maxlength="6" readonly />
                @error('email_verified') <span class="danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-4 col-md-4 col-sm-4 mb-1">
                <label class="form-label" for="accountZipCode">Blocked</label>
                <input type="text" class="form-control account-zip-code" id="accountZipCode" placeholder="Blocked" wire:model="is_blocked" maxlength="6" readonly />
                @error('is_blocked') <span class="danger">{{ $message }}</span> @enderror
            </div>

            <div wire:ignore class="col-12 col-md-12 col-sm-12 mb-1">
                <label class="form-label" for="accountZipCode">About Me </label>
                <textarea rows="4" class="form-control " id="accountZipCode" placeholder="Am Software Developer" wire:model="about_me">
                            </textarea>
                @error('about_me') <span class="danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-1 me-1">Update Personal Information</button>
            </div>
        </div>

    </form>

</div>