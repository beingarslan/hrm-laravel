<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Team\Team;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    public function index(){
        Helper::checkPermission('view-master-teams');

        return view('modules.team.index');
    }

    public function create(){
        Helper::checkPermission('add-master-teams');
        
        return view('modules.team.create');
    }

    public function store(Request $request){
        Helper::checkPermission('add-master-teams');

        $request->validate([
            'name'=> 'required',
            'description'=> 'required',
        ]);

        $team = Team::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name,'_'),
            'description'=>$request->description,
            'created_by'=>Auth::id(),
        ]);

        Toastr::success('Team created successfully.','Success');

        return redirect()->route('teams.edit',['id'=>$team->id]);
    }

    public function edit($id){
        Helper::checkPermission('edit-master-teams');

        $team=Team::select('teams.id','teams.name','teams.slug','teams.description','users.first_name as created_by','refuser.first_name as updated_by')
            ->where('teams.id',$id)
            ->leftjoin('users','users.id','=','teams.created_by')
            ->leftjoin('users as refuser','refuser.id','=','teams.updated_by')->first();

        return view('modules.team.edit',compact('team'));
    }

    public function update(Request $request){
        Helper::checkPermission('edit-master-teams');
        
        $team=Team::find($request->id);
        $request->validate([
            'name'=>'required',
            'description'=>'required'
        ]);
        $team->update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name,'_'),
            'description'=>$request->description,
            'updated_by'=>Auth::id(),
        ]);

        Toastr::success('Team updated successfully.','Success');
        
        return redirect()->back();
    }
}
