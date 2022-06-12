<?php

namespace Database\Seeders\Acl;

use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class HrPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // HR role permissions
        $hrPermissions = [
            'view-users',
            'create-users',
            'edit-users',
            'delete-users',
            'view-permissions',
            'create-permissions',
            'edit-permissions',
            'delete-permissions',
            'view-attendance-reports',
            'create-attendance-reports',
            'edit-attendance-reports',
            'delete-attendance-reports',
            'view-attendance-reports-by-date',
            'view-dashboard',
            'view-attendances',
            'add-attendances',
            'edit-attendances',
            'remove-attendances',
            'view-approvals',
            'view-master',
            'add-master',
            'edit-master',
            'remove-master',
            'view-master-departments',
            'add-master-departments',
            'view-master-designations',
            'add-master-designations',
            'view-master-roles',
            'add-master-roles',
            'view-master-shifts',
            'remove-master-shifts',
            'view-master-teams',
            'remove-master-teams',
            'view-master-menus',
            'remove-master-menus',
            'view-users-personal-details',
            'edit-users-official-details',
            'view-users-official-details',
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
            'edit-users-leaves-details',
            'view-users-leaves-details',
            'edit-users-salaries-details',
            'view-users-salaries-details',
            'edit-users-evaluation-details',
            'view-users-evaluation-details',
            'edit-users-security-details',
            'view-users-security-details',
            'edit-users-permissions-details',
            'view-users-permissions-details',
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
        $roles = Role::where('name', User::ROLE_HR)->first();
        $roles->syncPermissions($hrPermissions);
    }
}
