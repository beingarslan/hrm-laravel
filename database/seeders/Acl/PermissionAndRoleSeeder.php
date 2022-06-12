<?php

namespace Database\Seeders\Acl;

use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionAndRoleSeeder extends Seeder{

    public function run(){

        // permissions
        $permissions = [
            ['name' => 'view-users','guard_name' => 'web'],
            ['name' => 'create-users','guard_name' => 'web'],
            ['name' => 'edit-users','guard_name' => 'web'],
            ['name' => 'delete-users','guard_name' => 'web'],
            ['name' => 'view-permissions','guard_name' => 'web'],
            ['name' => 'create-permissions','guard_name' => 'web'],
            ['name' => 'edit-permissions','guard_name' => 'web'],
            ['name' => 'delete-permissions','guard_name' => 'web'],
            ['name' => 'view-attendance-reports','guard_name' => 'web'],
            ['name' => 'create-attendance-reports','guard_name' => 'web'],
            ['name' => 'edit-attendance-reports','guard_name' => 'web'],
            ['name' => 'delete-attendance-reports','guard_name' => 'web'],
            ['name' => 'view-attendance-reports-by-date','guard_name' => 'web'],
            ['name' => 'view-dashboard','guard_name' => 'web'],
            ['name' => 'view-attendances','guard_name' => 'web'],
            ['name' => 'add-attendances','guard_name' => 'web'],
            ['name' => 'edit-attendances','guard_name' => 'web'],
            ['name' => 'remove-attendances','guard_name' => 'web'],
            ['name' => 'view-approvals','guard_name' => 'web'],
            ['name' => 'add-approvals','guard_name' => 'web'],
            ['name' => 'edit-approvals','guard_name' => 'web'],
            ['name' => 'remove-approvals','guard_name' => 'web'],
            ['name' => 'view-inventory','guard_name' => 'web'],
            ['name' => 'add-inventory','guard_name' => 'web'],
            ['name' => 'edit-inventory','guard_name' => 'web'],
            ['name' => 'remove-inventory','guard_name' => 'web'],
            ['name' => 'view-inventory-categories','guard_name' => 'web'],
            ['name' => 'add-inventory-categories','guard_name' => 'web'],
            ['name' => 'edit-inventory-categories','guard_name' => 'web'],
            ['name' => 'remove-inventory-categories','guard_name' => 'web'],
            ['name' => 'view-inventory-options','guard_name' => 'web'],
            ['name' => 'add-inventory-options','guard_name' => 'web'],
            ['name' => 'edit-inventory-options','guard_name' => 'web'],
            ['name' => 'remove-inventory-options','guard_name' => 'web'],
            ['name' => 'view-inventory-option-values','guard_name' => 'web'],
            ['name' => 'add-inventory-option-values','guard_name' => 'web'],
            ['name' => 'edit-inventory-option-values','guard_name' => 'web'],
            ['name' => 'remove-inventory-option-values','guard_name' => 'web'],
            ['name' => 'view-inventory-brands','guard_name' => 'web'],
            ['name' => 'add-inventory-brands','guard_name' => 'web'],
            ['name' => 'edit-inventory-brands','guard_name' => 'web'],
            ['name' => 'remove-inventory-brands','guard_name' => 'web'],
            ['name' => 'view-inventory-statuses','guard_name' => 'web'],
            ['name' => 'add-inventory-statuses','guard_name' => 'web'],
            ['name' => 'edit-inventory-statuses','guard_name' => 'web'],
            ['name' => 'remove-inventory-statuses','guard_name' => 'web'],
            ['name' => 'view-inventory-types','guard_name' => 'web'],
            ['name' => 'add-inventory-types','guard_name' => 'web'],
            ['name' => 'edit-inventory-types','guard_name' => 'web'],
            ['name' => 'remove-inventory-types','guard_name' => 'web'],
            ['name' => 'view-inventory-shops','guard_name' => 'web'],
            ['name' => 'add-inventory-shops','guard_name' => 'web'],
            ['name' => 'edit-inventory-shops','guard_name' => 'web'],
            ['name' => 'remove-inventory-shops','guard_name' => 'web'],
            ['name' => 'view-inventory-warehouses','guard_name' => 'web'],
            ['name' => 'add-inventory-warehouses','guard_name' => 'web'],
            ['name' => 'edit-inventory-warehouses','guard_name' => 'web'],
            ['name' => 'remove-inventory-warehouses','guard_name' => 'web'],
            ['name' => 'view-inventory-products','guard_name' => 'web'],
            ['name' => 'add-inventory-products','guard_name' => 'web'],
            ['name' => 'edit-inventory-products','guard_name' => 'web'],
            ['name' => 'remove-inventory-products','guard_name' => 'web'],
            ['name' => 'view-inventory-products-uniques','guard_name' => 'web'],
            ['name' => 'add-inventory-products-uniques','guard_name' => 'web'],
            ['name' => 'edit-inventory-products-uniques','guard_name' => 'web'],
            ['name' => 'remove-inventory-products-uniques','guard_name' => 'web'],
            ['name' => 'view-master','guard_name' => 'web'],
            ['name' => 'add-master','guard_name' => 'web'],
            ['name' => 'edit-master','guard_name' => 'web'],
            ['name' => 'remove-master','guard_name' => 'web'],
            ['name' => 'view-master-departments','guard_name' => 'web'],
            ['name' => 'add-master-departments','guard_name' => 'web'],
            ['name' => 'edit-master-departments','guard_name' => 'web'],
            ['name' => 'remove-master-departments','guard_name' => 'web'],
            ['name' => 'view-master-designations','guard_name' => 'web'],
            ['name' => 'add-master-designations','guard_name' => 'web'],
            ['name' => 'edit-master-designations','guard_name' => 'web'],
            ['name' => 'remove-master-designations','guard_name' => 'web'],
            ['name' => 'view-master-roles','guard_name' => 'web'],
            ['name' => 'add-master-roles','guard_name' => 'web'],
            ['name' => 'edit-master-roles','guard_name' => 'web'],
            ['name' => 'remove-master-roles','guard_name' => 'web'],
            ['name' => 'view-master-shifts','guard_name' => 'web'],
            ['name' => 'add-master-shifts','guard_name' => 'web'],
            ['name' => 'edit-master-shifts','guard_name' => 'web'],
            ['name' => 'remove-master-shifts','guard_name' => 'web'],
            ['name' => 'view-master-teams','guard_name' => 'web'],
            ['name' => 'add-master-teams','guard_name' => 'web'],
            ['name' => 'edit-master-teams','guard_name' => 'web'],
            ['name' => 'remove-master-teams','guard_name' => 'web'],
            ['name' => 'view-master-menus','guard_name' => 'web'],
            ['name' => 'add-master-menus','guard_name' => 'web'],
            ['name' => 'edit-master-menus','guard_name' => 'web'],
            ['name' => 'remove-master-menus','guard_name' => 'web'],
            ['name' => 'edit-users-personal-details','guard_name' => 'web'],
            ['name' => 'view-users-personal-details','guard_name' => 'web'],
            ['name' => 'edit-users-official-details','guard_name' => 'web'],
            ['name' => 'view-users-official-details','guard_name' => 'web'],
            ['name' => 'add-users-education-details','guard_name' => 'web'],
            ['name' => 'edit-users-education-details','guard_name' => 'web'],
            ['name' => 'view-users-education-details','guard_name' => 'web'],
            ['name' => 'add-users-experience-details','guard_name' => 'web'],
            ['name' => 'edit-users-experience-details','guard_name' => 'web'],
            ['name' => 'view-users-experience-details','guard_name' => 'web'],
            ['name' => 'add-users-skills-details','guard_name' => 'web'],
            ['name' => 'edit-users-skills-details','guard_name' => 'web'],
            ['name' => 'view-users-skills-details','guard_name' => 'web'],
            ['name' => 'edit-users-attendance-details','guard_name' => 'web'],
            ['name' => 'view-users-attendance-details','guard_name' => 'web'],
            ['name' => 'edit-users-leaves-details','guard_name' => 'web'],
            ['name' => 'view-users-leaves-details','guard_name' => 'web'],
            ['name' => 'edit-users-salaries-details','guard_name' => 'web'],
            ['name' => 'view-users-salaries-details','guard_name' => 'web'],
            ['name' => 'edit-users-evaluation-details','guard_name' => 'web'],
            ['name' => 'view-users-evaluation-details','guard_name' => 'web'],
            ['name' => 'edit-users-security-details','guard_name' => 'web'],
            ['name' => 'view-users-security-details','guard_name' => 'web'],
            ['name' => 'edit-users-permissions-details','guard_name' => 'web'],
            ['name' => 'view-users-permissions-details','guard_name' => 'web'],
            ['name' => 'edit-users-my-profile','guard_name' => 'web'],
            ['name' => 'view-users-my-profile','guard_name' => 'web'],
            ['name' => 'edit-users-my-attendance','guard_name' => 'web'],
            ['name' => 'view-users-my-attendance','guard_name' => 'web'],
            ['name' => 'edit-users-my-password','guard_name' => 'web'],
            ['name' => 'view-users-my-password','guard_name' => 'web'],
            ['name' => 'edit-users-my-login-actvity','guard_name' => 'web'],
            ['name' => 'view-users-my-login-actvity','guard_name' => 'web'],
            ['name' => 'edit-users-my-remove-account','guard_name' => 'web'],
            ['name' => 'view-users-my-remove-account','guard_name' => 'web'],
            ['name' => 'edit-users-my-requests','guard_name' => 'web'],
            ['name' => 'view-users-my-requests','guard_name' => 'web'],
            ['name' => 'add-users-my-requests','guard_name' => 'web'],
            ['name' => 'view-master-leavetypes','guard_name' => 'web'],
            ['name' => 'add-master-leavetypes','guard_name' => 'web'],
            ['name' => 'edit-master-leavetypes','guard_name' => 'web'],
        ];

        // insert permissions in database
        Schema::disableForeignKeyConstraints();
        DB::table('permissions')->truncate();
        Permission::insert($permissions);
        Schema::enableForeignKeyConstraints();

        $roles = [
            ['name' => User::ROLE_SUPER_ADMIN, 'slug' => Str::slug(User::ROLE_SUPER_ADMIN), 'description' => 'Super Admin','guard_name' => 'web'],
            ['name' => User::ROLE_ADMIN, 'slug' => Str::slug(User::ROLE_ADMIN), 'description' => 'admin','guard_name' => 'web'],
            ['name' => User::ROLE_HR, 'slug' => Str::slug(User::ROLE_HR), 'description' => 'HR','guard_name' => 'web'],
            ['name' => User::ROLE_SUPERVISOR, 'slug' => Str::slug(User::ROLE_SUPERVISOR), 'description' => 'Supervisor','guard_name' => 'web'],
            ['name' => User::ROLE_EMPLOYEE, 'slug' => Str::slug(User::ROLE_EMPLOYEE), 'description' => 'Employee','guard_name' => 'web'],
        ];

        // insert roles in database
        Schema::disableForeignKeyConstraints();
        DB::table('roles')->truncate();
        Role::insert($roles);
        Schema::enableForeignKeyConstraints();











//
//        // get updated permissions from database name only
//        $permissions = Permission::pluck('name');
//
//        // get all roles from database expect super-aadmin
//        $roles = Role::whereNotIn('slug', 'super-admin')->get();
//
//        foreach ($roles as $role) {
//            $role->syncPermissions($permissions->random(rand(1, $permissions->count())));
//        }
//
//        // assign all permission to super admin
//        $roles = Role::where('slug', 'super-admin')->first();
//        $roles->syncPermissions($permissions);
    }

}
