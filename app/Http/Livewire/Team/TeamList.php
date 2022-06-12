<?php

namespace App\Http\Livewire\Team;

use App\Models\Team\Team;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class TeamList extends Component
{
    use WithPagination;
    public $currentPage = 1;
    public $searchText = '';

    public $name;


    public function filterDepartmentList()
    {
        $teams =  Team::query();
        if (!empty($this->name)) {
            $teams = $teams->where('name', 'like',  '%' . $this->name . '%')
                ->orWhere('slug', 'like',  '%' . $this->name . '%');
        }
        // order by
        $teams = $teams->orderBy('name', 'desc');
        return $teams->paginate(30);
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
        $teams = $this->filterDepartmentList();
        $data = ['teams' => $teams];
        return view('livewire.team.team-list', $data);
    }
}
