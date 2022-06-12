<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class InsertUser extends FormRequest{

    public function authorize(){
        return Auth::user()->hasPermissionTo('create-users');
    }

    public function rules(){

        return [
            'first_name' => 'required|regex:/^[a-zA-Z]+$/u|min:3|max:12',
            'last_name' => 'required|regex:/^[a-zA-Z]+$/u|min:3|max:12',
            'email' => 'required|email|unique:users,email',
            'phone_no' => 'required',
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required',
            'address' => 'required|max:200',
            'shift_time_id' => 'required|numeric|exists:shift_times,id',
            'role' => 'required',
            'department_id' => 'required|numeric|exists:departments,id',
            'designation_id' => 'required|numeric|exists:designations,id',
            'team_ids' => 'required|array|exists:teams,id,deleted_at,NULL',
            'date_of_joining' => 'required|date',
            'date_of_probation_end' => 'required|date|after:date_of_joining',
            'employee_id' => 'required|max:200',
            'cnic' => 'required|max:15',
            'supervisor_id' => 'required|numeric|exists:users,id',
        ];
    }


    public function messages(){
        return [
            'first_name.required' => 'This field is required',
            'first_name.min' => 'Minimum 3 alphabets required',
            'first_name.max' => 'Maximum 20 alphabets can be used',
        ];
    }

}
