<?php

namespace App\Http\Livewire\Shift;

use App\Models\ShiftTime\ShiftTime;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class ShiftList extends Component
{
    use WithPagination;
    public $currentPage = 1;
    public $searchText = '';

    public $name;

    public function filterDepartmentList()
    {
        $shifts =  ShiftTime::query();
        if (!empty($this->name)){
            $shifts = $shifts->where('name','like',  '%'.$this->name.'%')
            ->orWhere('slug','like',  '%'.$this->name.'%');
        }
        // order by
        $shifts = $shifts->orderBy('name', 'desc');
        return $shifts->paginate(30);
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
        $shifts = $this->filterDepartmentList();
        $data = ['shifts' => $shifts];
        return view('livewire.shift.shift-list', $data);
    }
}
