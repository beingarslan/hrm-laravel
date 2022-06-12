<?php

namespace App\Http\Livewire\Leave;


use App\Models\Leave\LeaveType;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class LeaveList extends Component
{
    use WithPagination;
    public $currentPage = 1;
    public $searchText = '';

    public $name;


    public function filterLeaveTypeList()
    {
        $leavetypes =  LeaveType::query();

        if (!empty($this->name)){
            $leavetypes = $leavetypes->where('name','like',  '%'.$this->name.'%')
                ->orWhere('slug','like',  '%'.$this->name.'%');
        }


        // order by
        $leavetypes = $leavetypes->orderBy('name', 'desc');

        return $leavetypes->paginate(30);
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

        $leavetypes = $this->filterLeaveTypeList();
        $data = ['leavetypes' => $leavetypes];
        return view('livewire.leave.leave-list', $data);
    }
}
