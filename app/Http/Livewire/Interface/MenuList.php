<?php

namespace App\Http\Livewire\Interface;

use App\Models\Interface\Menu;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class MenuList extends Component
{
    use WithPagination;
    public $currentPage = 1;
    public $searchText = '';

    public $name;


    public function filterDepartmentList()
    {
        $menus =  Menu::query();

        if (!empty($this->name)) {
            $menus = $menus->where('name', 'like',  '%' . $this->name . '%')
                ->orWhere('slug', 'like',  '%' . $this->name . '%');
        }


        // order by
        $menus = $menus->orderBy('order');

        return $menus->paginate(30);
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
        $menus = $this->filterDepartmentList();
        $data = ['menus' => $menus];
        return view('livewire.interface.menu-list', $data);
    }
}
