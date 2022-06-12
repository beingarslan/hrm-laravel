<?php

namespace App\Http\Livewire\User;
use App\Models\User\User;
use Livewire\Component;

class EditPersonalInformation extends Component{

    public $userId;
    public $personalInformation;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $email;
    public $phone_no;
    public $gender;
    public $date_of_birth;
    public $address;
    public $map_address;
    public $city;
    public $state;
    public $zip;
    public $date_of_joining;
    public $lat;
    public $cnic;
    public $lng;
    public $created_at;
    public $created_by;
    public $created_by_first_name;
    public $created_by_middle_name;
    public $created_by_last_name;
    public $updated_by_first_name;
    public $updated_by_middle_name;
    public $updated_by_last_name;
    public $about_me;


    protected $rules = [
        'first_name'    => 'required|string|min:3|max:200',
        'middle_name'   => 'max:200',
        'last_name'     => 'required|string|min:3|max:200',
        'phone_no'      => 'required|string|min:10|max:16',
        'gender'        => 'required',
        'date_of_birth'        => 'required',
        'address'        => 'required|string|max:255',
        'map_address'        => 'required|string|max:255',
        'city'        => 'required|string|max:255',
        'state'        => 'required|string|max:255',
        'zip'        => 'required|string|max:255',
//        'date_of_joining'        => 'required|string|max:255',
        'lat'        => 'required|string|max:255',
        'lng'        => 'required|string|max:255',
        'cnic'        => 'required|string|max:15',
    ];

    public function UpdatePersonalInformation(){

        $this->validate();

        $updatedPersonalInfo = [
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'phone_no' => $this->phone_no,
            'gender' => $this->gender,
            'date_of_birth' => $this->date_of_birth,
            'address' => $this->address,
            'map_address' => $this->map_address,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'about_me' => $this->about_me,
            'cnic' => $this->cnic,
        ];

        User::where('id', $this->userId)->update($updatedPersonalInfo);

        $this->dispatchBrowserEvent(
            'alert',
            [
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Personal infromation has been updated!'
            ]
        );

    }

    public function mount(){

        $personalInformation = User::personalInformation($this->userId)[0];
        $this->userId = $personalInformation->id;
        $this->first_name = $personalInformation->first_name;
        $this->middle_name = $personalInformation->middle_name;
        $this->last_name = $personalInformation->last_name;
        $this->email = $personalInformation->email;
        $this->phone_no = $personalInformation->phone_no;
        $this->gender = $personalInformation->gender;
        $this->date_of_birth = $personalInformation->date_of_birth;
        $this->address = $personalInformation->address;
        $this->map_address = $personalInformation->map_address;
        $this->city = $personalInformation->city;
        $this->state = $personalInformation->state;
        $this->zip = $personalInformation->zip;
        $this->date_of_joining = $personalInformation->date_of_joining;
        $this->lat = $personalInformation->lat;
        $this->lng = $personalInformation->lng;
        $this->lng = $personalInformation->lng;
        $this->cnic = $personalInformation->cnic;
        $this->created_at = $personalInformation->created_at;
        $this->created_by = $personalInformation->created_by;
        $this->created_by_first_name = $personalInformation->created_by_first_name;
        $this->created_by_middle_name = $personalInformation->created_by_middle_name;
        $this->created_by_last_name = $personalInformation->created_by_last_name;
        $this->updated_by_first_name = $personalInformation->updated_by_first_name;
        $this->updated_by_middle_name = $personalInformation->updated_by_middle_name;
        $this->updated_by_last_name = $personalInformation->updated_by_last_name;
        $this->about_me = $personalInformation->about_me;
    }

    public function render(){

        return view('livewire.user.edit-personal-information');
    }

}
