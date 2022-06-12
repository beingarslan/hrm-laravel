<?php

namespace App\Http\Livewire\Department;

use App\Models\Department\Department;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class DepartmentList extends Component
{
    use WithPagination;
    public $currentPage = 1;
    public $searchText = '';

    public $name;


    public function filterDepartmentList()
    {
        $departments =  Department::query();

        if (!empty($this->name)){
            $departments = $departments->where('name','like',  '%'.$this->name.'%')
            ->orWhere('slug','like',  '%'.$this->name.'%');
        }

        
        // order by
        $departments = $departments->orderBy('name', 'desc');
        
        return $departments->paginate(30);
    }

    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function () {
            return $this->currentPage;
        });
    }

    public function render()
    {

        $departments = $this->filterDepartmentList();
        $data = ['departments' => $departments];
        return view('livewire.department.department-list', $data);
    }
}
