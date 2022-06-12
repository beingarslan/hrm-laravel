<?php

namespace Database\Seeders\Acl;

use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class AdminPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // super admin role permissions
        $AdminPermissions = [
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
            'add-approvals',
            'edit-approvals',
            'remove-approvals',
            'view-master',
            'add-master',
            'edit-master',
            'remove-master',
            'view-master-departments',
            'add-master-departments',
            'edit-master-departments',
            'remove-master-departments',
            'view-master-designations',
            'add-master-designations',
            'edit-master-designations',
            'remove-master-designations',
            'view-master-roles',
            'add-master-roles',
            'edit-master-roles',
            'remove-master-roles',
            'view-master-shifts',
            'add-master-shifts',
            'edit-master-shifts',
            'remove-master-shifts',
            'view-master-teams',
            'add-master-teams',
            'edit-master-teams',
            'remove-master-teams',
            'view-master-menus',
            'add-master-menus',
            'edit-master-menus',
            'remove-master-menus',
            'edit-users-personal-details',
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
            'add-users-my-requests',
            'view-master-leavetypes',
            'add-master-leavetypes',
            'edit-master-leavetypes'
        ];

        // assign all permission to admin
        $roles = Role::where('name', User::ROLE_ADMIN)->first();
        $roles->syncPermissions($AdminPermissions);
    }
}
