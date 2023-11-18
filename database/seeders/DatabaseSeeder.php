<?php

namespace Database\Seeders;

use Database\Seeders\Acl\AdminPermissions;
use Database\Seeders\Acl\EmployeePermissions;
use Database\Seeders\Acl\HrPermissions;
use Database\Seeders\Acl\PermissionAndRoleSeeder;
use Database\Seeders\Acl\SuperAdminPermissions;
use Database\Seeders\Acl\SupervisorPermissions;
use Database\Seeders\Approval\ApprovalTypeSeeder;
use Database\Seeders\ApprovalStatus\ApprovalStatusSeeder;
use Database\Seeders\Department\DepartmentSeeder;
use Database\Seeders\Designation\DesignationSeeder;
use Database\Seeders\Interface\MenuSeeder;
use Database\Seeders\Inventory\InventoryBrandSeeder;
use Database\Seeders\Inventory\InventoryCategorySeeder;
use Database\Seeders\Inventory\InventoryOptionSeeder;
use Database\Seeders\Inventory\InventoryOptionValueSeeder;
use Database\Seeders\Inventory\InventoryProductSeeder;
use Database\Seeders\Inventory\InventoryShopSeeder;
use Database\Seeders\Inventory\InventoryStatusSeeder;
use Database\Seeders\Inventory\InventoryTypeSeeder;
use Database\Seeders\Inventory\InventoryWarehouseSeeder;
use Database\Seeders\Leave\LeavesSeeder;
use Database\Seeders\Leave\LeaveTypeSeeder;
use Database\Seeders\Media\MediaTypeSeeder;
use Database\Seeders\ShiftTime\ShiftTimeSeeder;
use Database\Seeders\Team\TeamSeeder;
use Database\Seeders\User\UserSeeder;
use Database\Seeders\User\UserTeamSeeder;
use Database\Seeders\UserApprovalRequest\UserApprovalRequestSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {

        $this->call([


            // first run the independent master seeders
            PermissionAndRoleSeeder::class,
            SuperAdminPermissions::class,
            AdminPermissions::class,
            HrPermissions::class,
            SupervisorPermissions::class,
            EmployeePermissions::class,

            MenuSeeder::class,

            DesignationSeeder::class,
            DepartmentSeeder::class,
            TeamSeeder::class,
            LeaveTypeSeeder::class,
            LeavesSeeder::class,
            ShiftTimeSeeder::class,
            MediaTypeSeeder::class,

            // run seeder to add new user with all options
            UserSeeder::class,
            // UserTeamSeeder::class,

            // temp seeder will be removed after development
            // AddDevelopersAccount::class,

            // approval type seeder
            ApprovalTypeSeeder::class,
            ApprovalStatusSeeder::class,
            // UserApprovalRequestSeeder::class,

            // inventory seeder
            InventoryCategorySeeder::class,
            InventoryOptionSeeder::class,
            InventoryOptionValueSeeder::class,
            InventoryTypeSeeder::class,
            InventoryBrandSeeder::class,
            InventoryStatusSeeder::class,
            InventoryShopSeeder::class,
            InventoryWarehouseSeeder::class,
            InventoryProductSeeder::class,
        ]);
    }
}
