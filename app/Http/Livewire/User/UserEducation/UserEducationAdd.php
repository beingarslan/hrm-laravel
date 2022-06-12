<?php

namespace App\Http\Livewire\User\UserEducation;


use App\Models\User\User;
use App\Models\User\UserEducation;
use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use function PHPUnit\Framework\callback;

class UserEducationAdd extends Component
{
    public $current_id;
    public $userId;
    public $degree_name;
    public $degree_type;
    public $grade;
    public $institute_name;
    public $educations;
    public $to;
    public $from;
    public $degree_name_e;
    public $degree_type_e;
    public $grade_e;
    public $institute_name_e;
    public $educations_e;
    public $to_e;
    public $from_e;

    protected $listeners = ['update' => 'update'];

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->readEducation();
    }

    public function readEducation()
    {
        $this->educations = User::where('id', $this->userId)->first()->educations;
    }

    protected $rules = [
        'degree_type' => 'required',
        'degree_name' => 'required',
        'institute_name' => 'required',
        'grade' => 'required',
        'to'=>'required',
        'from'=>'required',
    ];

    public function addEducation()
    {
        $this->validate();
        User::where('id', $this->userId)->first()->educations()->create([
            'name' => $this->degree_name,
            'grade' => $this->grade,
            'degree_type' => $this->degree_type,
            'institute' => $this->institute_name,
            'from'=>$this->from,
            'to'=>$this->to,
        ]);

        $this->dispatchBrowserEvent(
            'alert',
            [
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Record Has Been Added'
            ]
        );
        $this->reset_education();
        $this->readEducation();
    }

    public function reset_education(){
        $this->degree_name=null;
        $this->degree_type=null;
        $this->grade=null;
        $this->institute_name=null;
        $this->educations=null;
        $this->to=null;
        $this->from=null;
        $this->degree_name_e=null;
        $this->degree_type_e=null;
        $this->grade_e=null;
        $this->institute_name_e=null;
        $this->educations_e=null;
        $this->to_e=null;
        $this->from_e=null;
    }

    public function edit($id)
    {
        $education=UserEducation::select('user_education.id','user_education.name','user_education.grade','user_education.degree_type','user_education.institute','user_education.from','user_education.to')
            ->where('user_education.id',$id)->first();

        $this->current_id=$education->id;
        $this->degree_name_e=$education->name;
        $this->grade_e=$education->grade;
        $this->degree_type_e=$education->degree_type;
        $this->institute_name_e=$education->institute;
        $this->from_e=$education->from;
        $this->to_e=$education->to;

        $this->updateMode = true;

    }

    public function update()
    {
        $education = UserEducation::find($this->current_id);
        $education->update([
            'name' => $this->degree_name_e,
            'grade' => $this->grade_e,
            'degree_type' => $this->degree_type_e,
            'institute' => $this->institute_name_e,
            'from' => $this->from_e,
            'to' => $this->to_e,
        ]);
        $this->dispatchBrowserEvent(
            'alert',
            [
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Record Has Been Updated'
            ]
        );
        $this->reset_education();
        $this->readEducation();
    }

        public function render()
    {
        return view('livewire.user.user-education.user-education-add');
    }




    public function validateData()
    {
        $this->dispatchBrowserEvent(
            'swal:confirm',
            [
                'type' => 'warning',
                'message' => 'Are you sure?',
                'text' => 'Record Will Be Updated!',
                'method_name' => 'update',
                'method_params' => []
            ]
        );
    }


}
