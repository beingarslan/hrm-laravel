<?php

namespace App\Http\Livewire\Role;


use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RoleList extends Component
{
    use WithPagination;
    public $currentPage = 1;
    public $searchText = '';

    public $name;


    public function filterDepartmentList()
    {
        $roles =  Role::query();

        if (!empty($this->name)){
            $roles = $roles->where('name','like',  '%'.$this->name.'%')
            ->orWhere('slug','like',  '%'.$this->name.'%');
        }

        
        // order by
        $roles = $roles->orderBy('name', 'desc');
        
        return $roles->paginate(30);
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

        $roles = $this->filterDepartmentList();
        $data = ['roles' => $roles];
        return view('livewire.role.role-list', $data);
    }
}
