<?php

namespace App\Http\Livewire\Skill;

use App\Models\Skill\Skill;
use App\Models\User\User;
use Livewire\Component;

class SkillList extends Component
{
    public $current_id;
    public $userId;
    public $skill;
    public $description;
    public $skill_e;
    public $skills;
    public $description_e;


    protected $listeners = ['update' => 'update','destroy'=>'destroy'];

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->readSkill();
    }

    public function readSkill()
    {
        $this->skills = User::where('id', $this->userId)->first()->skills;
    }

    protected $rules = [
        'skill' => 'required',
        'description' => 'required',
    ];

    public function addSkill()
    {
        $this->validate();
        User::where('id', $this->userId)->first()->skills()->create([
            'skill' => $this->skill,
            'description' => $this->description,
        ]);

        $this->dispatchBrowserEvent(
            'alert',
            [
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Record Has Been Added'
            ]
        );
        $this->reset_skill();
        $this->readSkill();
    }

    public function reset_skill()
    {
        $this->skill = null;
        $this->description = null;
        $this->skill_e = null;
        $this->description_e = null;
    }

    public function edit($id)
    {
        $skill = Skill::select('skills.id', 'skills.skill', 'skills.description')
            ->where('skills.id', $id)->first();

        $this->current_id = $skill->id;
        $this->skill_e = $skill->skill;
        $this->description_e = $skill->description;

        $this->updateMode = true;

    }

    public function update()
    {
        $skill = Skill::find($this->current_id);
        $skill->update([
            'company' => $this->skill_e,
            'description' => $this->description_e,
        ]);
        $this->dispatchBrowserEvent(
            'alert',
            [
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Record Has Been Updated'
            ]
        );
        $this->reset_skill();
        $this->readSkill();
    }

    public function delete($id)
    {
        $this->current_id = $id;
        $this->validateData_delete();
    }

    public function destroy()
    {
        $skill=Skill::find($this->current_id);
        $skill->delete();
        $this->dispatchBrowserEvent(
            'alert',
            [
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Record Has Been Deleted'
            ]
        );
        $this->reset_skill();
        $this->readSkill();

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

    public function validateData_delete()
    {
        $this->dispatchBrowserEvent(
            'swal:confirm',
            [
                'type' => 'warning',
                'message' => 'Are you sure?',
                'text' => 'Record Will Be Deleted!',
                'method_name' => 'destroy',
                'method_params' => []
            ]
        );
    }

    public function render()
    {
        return view('livewire.skill.skill-list');
    }
}
