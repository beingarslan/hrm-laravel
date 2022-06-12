<?php

namespace App\Http\Controllers\Leave;

use App\Models\Leave\LeaveUser;
use App\Http\Requests\StoreLeaveUserRequest;
use App\Http\Requests\UpdateLeaveUserRequest;
use Illuminate\Routing\Controller;

class LeaveUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLeaveUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLeaveUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave\LeaveUser  $leaveUser
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveUser $leaveUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave\LeaveUser  $leaveUser
     * @return \Illuminate\Http\Response
     */
    public function edit(LeaveUser $leaveUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLeaveUserRequest  $request
     * @param  \App\Models\Leave\LeaveUser  $leaveUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLeaveUserRequest $request, LeaveUser $leaveUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave\LeaveUser  $leaveUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveUser $leaveUser)
    {
        //
    }
}
