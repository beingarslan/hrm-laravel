<?php

use App\Http\Controllers\Approval\ApprovalController as ApprovalApprovalController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\Designation\DesignationController;
use App\Http\Controllers\Leave\LeaveTypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Interface\MenuController;
use App\Http\Controllers\Inventory\InventoryBrandController;
use App\Http\Controllers\Inventory\InventoryCategoryController;
use App\Http\Controllers\Inventory\InventoryOptionController;
use App\Http\Controllers\Inventory\InventoryOptionValueController;
use App\Http\Controllers\Inventory\InventoryProductController;
use App\Http\Controllers\Inventory\InventoryShopController;
use App\Http\Controllers\Inventory\InventoryStatusController;
use App\Http\Controllers\Inventory\InventoryTypeController;
use App\Http\Controllers\Inventory\InventoryUniqueProductController;
use App\Http\Controllers\Inventory\InventoryWarehouseController;
use App\Http\Controllers\User\LateApprovalRequestController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Shift\ShiftController;
use App\Http\Controllers\Team\TeamController;
use App\Http\Controllers\User\ApprovalController;
use App\Http\Controllers\User\UserAttendanceController;
use App\Http\Controllers\User\UserController;
use App\Models\Inventory\InventoryCategory;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    } else {
        return redirect('/login');
    }
});

Route::middleware('auth')->group(

    function () {
        Route::group(
            [
                'prefix' => 'dashboard',
                'as' => 'dashboard',
                'middleware' => ['role_or_permission:Super Admin|view-dashboard']
            ],
            function () {
                Route::get('/', [HomeController::class, 'dashboard']);
            }
        );

        Route::group(
            [
                'prefix' => 'users',
                'as' => 'users.',
                'middleware' => ['role_or_permission:Super Admin|view-users|view-users-my-profile']
            ],
            function () {
                Route::get('/list', [UserController::class, 'list'])->name('list');
                Route::get('/users', [UserController::class, 'users'])->name('users');
                Route::get('/view/{id}', [UserController::class, 'view'])->name('view');
                Route::get('/add', [UserController::class, 'add'])->name('add');
                Route::post('/save', [UserController::class, 'save'])->name('save');

                Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
                Route::get('/leaves/{id}', [UserController::class, 'leaves'])->name('leaves');
                Route::get('/attendance/{id}', [UserController::class, 'attendance'])->name('attendance');
                Route::get('/evaluation/{id}', [UserController::class, 'evaluation'])->name('evaluation');
                Route::get('/salaries/{id}', [UserController::class, 'salaries'])->name('salaries');

                Route::get('/security', [UserController::class, 'security'])->name('security');
                Route::post('/update-password', [UserController::class, 'updatePassword'])->name('update-password');



                Route::group(
                    [
                        'prefix' => 'approvals',
                        'as' => 'approvals.',
                        'middleware' => ['role_or_permission:Super Admin|view-approvals|view-users-my-requests']
                    ],
                    function () {
                        Route::get('/', [ApprovalController::class, 'index'])->name('index');
                        Route::get('/create', [ApprovalController::class, 'create'])->name('create');
                        Route::get('/view/{id}', [ApprovalController::class, 'view'])->name('view');
                        Route::post('/save', [ApprovalController::class, 'save'])->name('save');
                    }
                );

            }
        );


        Route::group(
            [
                'prefix' => 'attendances',
                'as' => 'attendances.',
                // 'middleware' => ['role_or_permission:Super Admin|view-approvals']
            ],
            function () {
                Route::get('/', [AttendanceController::class, 'index'])->name('index');
                Route::get('/attendance', [UserAttendanceController::class, 'attendance'])->name('attendance');
            }
        );

        Route::group(
            [
                'prefix' => 'departments',
                'as' => 'departments.',
                'middleware' => ['role_or_permission:Super Admin|view-master-departments']
            ],
            function () {
                Route::get('/', [DepartmentController::class, 'index'])->name('index');
                Route::get('/create', [DepartmentController::class, 'create'])->name('create');
                Route::get('/edit/{id}', [DepartmentController::class, 'edit'])->name('edit');
                Route::patch('/update', [DepartmentController::class, 'update'])->name('update');
                Route::post('/store', [DepartmentController::class, 'store'])->name('store');
            }
        );

        Route::group(
            [
                'prefix' => 'leavetypes',
                'as' => 'leavetypes.',
                'middleware' => ['role_or_permission:Super Admin|view-master-leavetypes']
            ],
            function () {
                Route::get('/', [LeaveTypeController::class, 'index'])->name('index');
                Route::get('/create', [LeaveTypeController::class, 'create'])->name('create');
                Route::get('/edit/{id}', [LeaveTypeController::class, 'edit'])->name('edit');
                Route::patch('/update', [LeaveTypeController::class, 'update'])->name('update');
                Route::post('/store', [LeaveTypeController::class, 'store'])->name('store');
            }
        );

        Route::group(
            [
                'prefix' => 'interfaces',
                'as' => 'interfaces.',
            ],
            function () {
                Route::group(
                    [
                        'prefix' => 'menus',
                        'as' => 'menus.',
                        'middleware' => ['role_or_permission:Super Admin|view-master-menus']
                    ],
                    function () {
                        Route::get('/', [MenuController::class, 'index'])->name('index');
                        Route::get('/create', [MenuController::class, 'create'])->name('create');
                        Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('edit');
                        Route::post('/update', [MenuController::class, 'update'])->name('update');
                        Route::post('/store', [MenuController::class, 'store'])->name('store');
                    }
                );
            }
        );

        Route::group(
            [
                'prefix' => 'designations',
                'as' => 'designations.',
                'middleware' => ['role_or_permission:Super Admin|view-master-designations']
            ],
            function () {
                Route::get('/', [DesignationController::class, 'index'])->name('index');
                Route::get('/create', [DesignationController::class, 'create'])->name('create');
                Route::get('/edit/{id}', [DesignationController::class, 'edit'])->name('edit');
                Route::patch('/update', [DesignationController::class, 'update'])->name('update');
                Route::post('/store', [DesignationController::class, 'store'])->name('store');
            }
        );

        Route::group(
            [
                'prefix' => 'roles',
                'as' => 'roles.',
                'middleware' => ['role_or_permission:Super Admin|view-master-roles']
            ],
            function () {
                Route::get('/', [RoleController::class, 'index'])->name('index');
                Route::get('/create', [RoleController::class, 'create'])->name('create');
                Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
                Route::patch('/update', [RoleController::class, 'update'])->name('update');
                Route::post('/store', [RoleController::class, 'store'])->name('store');
            }
        );

        Route::group(
            [
                'prefix' => 'shifts',
                'as' => 'shifts.',
                'middleware' => ['role_or_permission:Super Admin|view-master-shifts']
            ],
            function () {
                Route::get('/', [ShiftController::class, 'index'])->name('index');
                Route::get('/create', [ShiftController::class, 'create'])->name('create');
                Route::get('/edit/{id}', [ShiftController::class, 'edit'])->name('edit');
                Route::patch('/update', [ShiftController::class, 'update'])->name('update');
                Route::post('/store', [ShiftController::class, 'store'])->name('store');
            }
        );

        Route::group(
            [
                'prefix' => 'teams',
                'as' => 'teams.',
                'middleware' => ['role_or_permission:Super Admin|view-master-teams']
            ],
            function () {
                Route::get('/', [TeamController::class, 'index'])->name('index');
                Route::get('/create', [TeamController::class, 'create'])->name('create');
                Route::get('/edit/{id}', [TeamController::class, 'edit'])->name('edit');
                Route::patch('/update', [TeamController::class, 'update'])->name('update');
                Route::post('/store', [TeamController::class, 'store'])->name('store');
            }
        );


        Route::group(
            [
                'prefix' => 'late_approval_requests',
                'as' => 'late_approval_requests.',
                'middleware' => ['role:Super Admin']
            ],
            function () {
                Route::get('/create', [LateApprovalRequestController::class, 'create'])->name('create');
                Route::post('/save', [LateApprovalRequestController::class, 'save'])->name('save');
            }
        );

        Route::group(
            [
                'prefix' => 'approvals',
                'as' => 'approvals.',
            ],
            function () {
                Route::get('/', [ApprovalApprovalController::class, 'index'])->name('index');
                Route::get('/create', [ApprovalApprovalController::class, 'create'])->name('create');
                Route::get('/view/{id}', [ApprovalApprovalController::class, 'view'])->name('view');
                Route::post('/save', [ApprovalApprovalController::class, 'save'])->name('save');
            }
        );

        // inventory
        Route::group(
            [
                'prefix' => 'inventory',
                'as' => 'inventory.',
                'middleware' => ['role_or_permission:Super Admin|view-inventory']
            ],
            function () {
                // inventory category
                Route::group(
                    [
                        'prefix' => 'categories',
                        'as' => 'categories.',
                        'middleware' => ['role_or_permission:Super Admin|view-inventory-categories']
                    ],
                    function () {
                        Route::get('/', [InventoryCategoryController::class, 'index'])->name('index');
                        Route::get('/create', [InventoryCategoryController::class, 'create'])->name('create');
                        Route::post('/store', [InventoryCategoryController::class, 'store'])->name('store');
                        Route::get('/edit/{id}', [InventoryCategoryController::class, 'edit'])->name('edit');
                        Route::post('/update', [InventoryCategoryController::class, 'update'])->name('update');
                    }
                );
                Route::group(
                    [
                        'prefix' => 'brands',
                        'as' => 'brands.',
                        'middleware' => ['role_or_permission:Super Admin|view-inventory-brands']
                    ],
                    function () {
                        Route::get('/', [InventoryBrandController::class, 'index'])->name('index');
                        Route::get('/create', [InventoryBrandController::class, 'create'])->name('create');
                        Route::post('/store', [InventoryBrandController::class, 'store'])->name('store');
                        Route::get('/edit/{id}', [InventoryBrandController::class, 'edit'])->name('edit');
                        Route::post('/update', [InventoryBrandController::class, 'update'])->name('update');
                    }
                );
                Route::group(
                    [
                        'prefix' => 'types',
                        'as' => 'types.',
                        'middleware' => ['role_or_permission:Super Admin|view-inventory-types']
                    ],
                    function () {
                        Route::get('/', [InventoryTypeController::class, 'index'])->name('index');
                        Route::get('/create', [InventoryTypeController::class, 'create'])->name('create');
                        Route::post('/store', [InventoryTypeController::class, 'store'])->name('store');
                        Route::get('/edit/{id}', [InventoryTypeController::class, 'edit'])->name('edit');
                        Route::post('/update', [InventoryTypeController::class, 'update'])->name('update');
                    }
                );
                Route::group(
                    [
                        'prefix' => 'shops',
                        'as' => 'shops.',
                        'middleware' => ['role_or_permission:Super Admin|view-inventory-shops']
                    ],
                    function () {
                        Route::get('/', [InventoryShopController::class, 'index'])->name('index');
                        Route::get('/create', [InventoryShopController::class, 'create'])->name('create');
                        Route::post('/store', [InventoryShopController::class, 'store'])->name('store');
                        Route::get('/edit/{id}', [InventoryShopController::class, 'edit'])->name('edit');
                        Route::post('/update', [InventoryShopController::class, 'update'])->name('update');
                    }
                );
                Route::group(
                    [
                        'prefix' => 'warehouses',
                        'as' => 'warehouses.',
                        'middleware' => ['role_or_permission:Super Admin|view-inventory-warehouses']
                    ],
                    function () {
                        Route::get('/', [InventoryWarehouseController::class, 'index'])->name('index');
                        Route::get('/create', [InventoryWarehouseController::class, 'create'])->name('create');
                        Route::post('/store', [InventoryWarehouseController::class, 'store'])->name('store');
                        Route::get('/edit/{id}', [InventoryWarehouseController::class, 'edit'])->name('edit');
                        Route::post('/update', [InventoryWarehouseController::class, 'update'])->name('update');
                    }
                );
                Route::group(
                    [
                        'prefix' => 'statuses',
                        'as' => 'statuses.',
                        'middleware' => ['role_or_permission:Super Admin|view-inventory-statuses']
                    ],
                    function () {
                        Route::get('/', [InventoryStatusController::class, 'index'])->name('index');
                        Route::get('/create', [InventoryStatusController::class, 'create'])->name('create');
                        Route::post('/store', [InventoryStatusController::class, 'store'])->name('store');
                        Route::get('/edit/{id}', [InventoryStatusController::class, 'edit'])->name('edit');
                        Route::post('/update', [InventoryStatusController::class, 'update'])->name('update');
                    }
                );
                Route::group(
                    [
                        'prefix' => 'options',
                        'as' => 'options.',
                        'middleware' => ['role_or_permission:Super Admin|view-inventory-options']
                    ],
                    function () {
                        Route::get('/', [InventoryOptionController::class, 'index'])->name('index');
                        Route::get('/create', [InventoryOptionController::class, 'create'])->name('create');
                        Route::post('/store', [InventoryOptionController::class, 'store'])->name('store');
                        Route::get('/edit/{id}', [InventoryOptionController::class, 'edit'])->name('edit');
                        Route::post('/update', [InventoryOptionController::class, 'update'])->name('update');

                        Route::group(
                            [
                                'prefix' => 'values',
                                'as' => 'values.',
                            ],
                            function () {
                                Route::get('/{option_id}', [InventoryOptionValueController::class, 'index'])->name('index');
                            }
                        );
                    }
                );
                Route::group(
                    [
                        'prefix' => 'products',
                        'as' => 'products.',
                        'middleware' => ['role_or_permission:Super Admin|view-inventory-products']
                    ],
                    function () {
                        Route::get('/', [InventoryProductController::class, 'index'])->name('index');
                        Route::get('/create', [InventoryProductController::class, 'create'])->name('create');
                        Route::post('/save', [InventoryProductController::class, 'save'])->name('save');
                        Route::get('/edit/{id}', [InventoryProductController::class, 'edit'])->name('edit');

                        Route::group(
                            [
                                'prefix' => 'uniques',
                                'as' => 'uniques.',
                                'middleware' => ['role_or_permission:Super Admin|view-inventory-products-uniques']
                            ],
                            function () {
                                Route::get('/{product_id}', [InventoryUniqueProductController::class, 'index'])->name('index');
                                Route::post('/save', [InventoryUniqueProductController::class, 'save'])->name('save');
                                Route::get('/edit/{id}', [InventoryUniqueProductController::class, 'edit'])->name('edit');
                            }
                        );
                    }
                );
            }
        );
    }
);

Route::group(
    [
        'middleware' => 'auth',
    ],
    function () {
        // main dashboard

        // user related routes
        Route::get('user', [UserController::class, 'index'])->name('user.index');
        Route::get('user/add', [UserController::class, 'addView'])->name('user.add');
        Route::post('user/register-new-user', [UserController::class, 'insertInDatabase'])->name('user.new-registration');

        Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.update-user');
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    }
);

Auth::routes();


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// test route
Route::get('/test', function () {
    $data = InventoryCategory::with('child')->get();
    dd($data->toArray());
});
