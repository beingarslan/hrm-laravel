<?php

namespace Database\Seeders\Acl;

use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class EmployeePermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Employee role permissions
        $employeePermissions = [

            'view-dashboard',
            'view-users-personal-details',
            'add-users-education-details',
            'edit-users-education-details',
            'view-users-education-details',
            'add-users-experience-details',
            'edit-users-experience-details',
            'view-users-experience-details',
            'add-users-skills-details',
            'edit-users-skills-details',
            'view-users-skills-details',
            'edit-users-attendance-details',
            'view-users-attendance-details',
            'edit-users-my-profile',
            'view-users-my-profile',
            'edit-users-my-attendance',
            'view-users-my-attendance',
            'edit-users-my-password',
            'view-users-my-password',
            'edit-users-my-login-actvity',
            'view-users-my-login-actvity',
            'edit-users-my-remove-account',
            'view-users-my-remove-account',
            'edit-users-my-requests',
            'view-users-my-requests',
            'add-users-my-requests'
        ];

        // assign all permission to admin
        $roles = Role::where('name', User::ROLE_EMPLOYEE)->first();
        $roles->syncPermissions($employeePermissions);
    }
}
