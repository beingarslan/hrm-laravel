<?php

namespace App\Http\Livewire\Designation;

use App\Models\Designation\Designation;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class DesignationList extends Component
{
    use WithPagination;
    public $currentPage = 1;
    public $searchText = '';

    public $name;


    public function filterDepartmentList()
    {
        $designations =  Designation::query();

        if (!empty($this->name)){
            $designations = $designations->where('name','like',  '%'.$this->name.'%')
            ->orWhere('slug','like',  '%'.$this->name.'%');
        }

        
        // order by
        $designations = $designations->orderBy('name', 'desc');
        
        return $designations->paginate(30);
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
        $designations = $this->filterDepartmentList();
        $data = ['designations' => $designations];
        return view('livewire.designation.designation-list', $data);
    }
}
