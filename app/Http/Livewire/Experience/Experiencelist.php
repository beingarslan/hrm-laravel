<?php

namespace App\Http\Livewire\Experience;

use App\Models\Experience\Experience;
use App\Models\User\User;
use App\Models\User\UserEducation;
use Livewire\Component;

class Experiencelist extends Component
{
    public $current_id;
    public $userId;
    public $company_name;
    public $designation;
    public $description;
    public $experiences;
    public $to;
    public $from;
    public $company_name_e;
    public $designation_e;
    public $description_e;
    public $experiences_e;
    public $to_e;
    public $from_e;

    protected $listeners = ['update' => 'update'];

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->readExperience();
    }

    public function readExperience()
    {
        $this->experiences = User::where('id', $this->userId)->first()->experiences;
    }

    protected $rules = [
        'company_name' => 'required',
        'designation' => 'required',
        'description' => 'required',
        'to' => 'required',
        'from' => 'required',
    ];

    public function addExperience()
    {
        $this->validate();
        User::where('id', $this->userId)->first()->experiences()->create([
            'company' => $this->company_name,
            'designation' => $this->designation,
            'description' => $this->description,
            'from' => $this->from,
            'to' => $this->to,
        ]);

        $this->dispatchBrowserEvent(
            'alert',
            [
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Record Has Been Added'
            ]
        );
        $this->reset_experience();
        $this->readExperience();
    }

    public function reset_experience()
    {
        $this->company_name = null;
        $this->designation = null;
        $this->description = null;
        $this->experiences = null;
        $this->to = null;
        $this->from = null;
        $this->company_name_e = null;
        $this->description_e = null;
        $this->designation_e = null;
        $this->experiences_e = null;
        $this->to_e = null;
        $this->from_e = null;
    }

    public function edit($id)
    {
        $experience = Experience::select('experiences.id', 'experiences.company', 'experiences.designation', 'experiences.description', 'experiences.from', 'experiences.to')
            ->where('experiences.id', $id)->first();

        $this->current_id = $experience->id;
        $this->company_name_e = $experience->company;
        $this->description_e = $experience->description;
        $this->designation_e = $experience->designation;
        $this->from_e = $experience->from;
        $this->to_e = $experience->to;

        $this->updateMode = true;

    }

    public function update()
    {
        $experience = Experience::find($this->current_id);
        $experience->update([
            'company' => $this->company_name_e,
            'designation' => $this->designation_e,
            'description' => $this->description_e,
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
        $this->reset_experience();
        $this->readExperience();
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

    public function render()
    {
        return view('livewire.experience.experiencelist');
    }
}
