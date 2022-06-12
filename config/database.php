<?php

use Illuminate\Support\Str;

return [

    'default' => env('DB_CONNECTION', 'mysql'),

    'connections' => [

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => false,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

    ],

    'migrations' => 'migrations',

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_') . '_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

    'models' => [

        'User' => [
            'table' => 'users',
            'fillable' => ['id', 'uuid', 'first_name', 'middle_name', 'gender', 'last_name', 'email', 'password', 'cnic', 'supervisor_id', 'two_factor_secret', 'two_factor_recovery_codes', 'about_me', 'date_of_birth', 'date_of_joining', 'date_of_probation_end', 'employee_id', 'role_id', 'shift_time_id', 'team_id', 'designation_id', 'department_id', 'phone_no', 'address', 'map_address', 'city', 'state', 'zip', 'lat', 'lng', 'email_verified', 'phone_verified', 'business_verified', 'is_login', 'is_blocked', 'remember_token', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at'],
        ],

        'UserView' => [
            'table' => 'view_users'
        ],

        'AttendanceView' => [
            'table' => 'view_attendance'
        ],

        'UserDailyAttendanceView' => [
            'table' => 'view_user_daily_attendance'
        ],

        'UserTeamView' => [
            'table' => 'view_user_teams'
        ],

        'UserTeam' => [
            'table' => 'user_teams',
            'fillable' => ['user_id', 'team_id', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at'],
        ],

        'UserAttendance' => [
            'table' => 'user_attendances',
            'fillable' => ['attendance_date', 'login', 'logout', 'is_late', 'is_approve
            d', 'duration', 'check_in_user_agent', 'check_in_ip_address', 'check_out_user_agent', 'check_out_ip_address','user_id', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at'],
        ],

        'UserBreak' => [
            'table' => 'user_breaks',
            'fillable' => ['user_attendance_id', 'break_in', 'break_out', 'duration', 'break_in_user_agent', 'break_in_ip_address', 'break_out_user_agent', 'break_out_ip_address', 'user_id', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at'],
        ],

        'UserMedia' => [
            'table' => 'user_media',
            'fillable' => ['user_id', 'media_id', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at'],
        ],

        'UserSession' => [
            'table' => 'sessions',
            'fillable' => ['user_id', 'ip_address', 'user_agent', 'payload', 'last_activity', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at'],
        ],

        'UserApprovalRequest' => [
            'table' => 'user_approval_requests',
            'fillable' => ['title' ,'approval_type_id', 'approval_status_id', 'approval_date', 'user_id', 'supervisor_id', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at'],
        ],

        'Department' => [
            'table' => 'departments',
            'fillable' => ['name', 'slug', 'description', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],

        'ShiftTime' => [
            'table' => 'shift_times',
            'fillable' => ['name', 'slug', 'description', 'buffer_time', 'logout', 'login', 'break_in', 'break_out', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],

        'ApprovalType' => [
            'table' => 'approval_types',
            'fillable' => ['name', 'slug', 'description', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],

        'ApprovalStatus' => [
            'table' => 'approval_status',
            'fillable' => ['name', 'slug', 'description', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],

        'Approval' => [
            'table' => 'approvals',
            'fillable' => ['title', 'slug', 'description', 'sender_comment', 'receiver_comment', 'user_id', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],

        'UserApprovalComment' => [
            'table' => 'user_approval_comments',
            'fillable' => ['comment', 'is_read','created_at', 'user_approval_id', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],

        'Designation' => [
            'table' => 'designations',
            'fillable' => ['name', 'slug', 'description', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],

        'Team' => [
            'table' => 'teams',
            'fillable' => ['name', 'slug', 'description', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],

        'Media' => [
            'table' => 'media',
            'fillable' => ['title', 'unique_name', 'link', 'base_url', 'extension', 'size', 'alt_tag', 'description', 'media_type_id', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],

        'MediaTypes' => [
            'table' => 'media_types',
            'fillable' => ['name', 'slug', 'description', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],

        // Inventory
        'InventoryCategory' => [
            'table' => 'inventory_categories',
            'fillable' => ['name', 'slug', 'description', 'parent_id', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],

        'InventoryOption' => [
            'table' => 'inventory_options',
            'fillable' => ['name', 'slug', 'description', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],

        'InventoryOptionValue' => [
            'table' => 'inventory_option_values',
            'fillable' => ['name', 'slug', 'description', 'inventory_option_id', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],

        'InventoryItem' => [
            'table' => 'inventory_items',
            'fillable' => ['name', 'slug', 'description', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],

        'Inventory' => [
            'table' => 'inventories',
            'fillable' => ['name', 'slug', 'description', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],

        'InventoryType' => [
            'table' => 'inventory_types',
            'fillable' => ['name', 'slug', 'description', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],

        'InventoryShop' => [
            'table' => 'inventory_shops',
            'fillable' => ['name', 'slug', 'description', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],

        'InventoryBrand' => [
            'table' => 'inventory_brands',
            'fillable' => ['name', 'slug', 'description', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],

        'InventoryStatus' => [
            'table' => 'inventory_statuses',
            'fillable' => ['name', 'slug', 'description', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            ],

        'UserEducation' => [
            'table' => 'user_education',
            'fillable' => ['id', 'institute', 'name', 'grade', 'user_id','to','from' ,'degree_type', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at'],
        ],
        'Experience' => [
            'table' => 'experiences',
            'fillable' => ['id', 'company', 'description', 'designation', 'user_id','to','from' ,'degree_type', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at'],
        ],

        'Skill' => [
            'table' => 'skills',
            'fillable' => ['id', 'skill', 'description', 'user_id', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at'],
        ],

        'InventoryWarehouse' => [
            'table' => 'inventory_warehouses',
            'fillable' => ['name', 'slug', 'description', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],
        'InventoryProduct' => [
            'table' => 'inventory_products',
            'fillable' => ['name', 'sku', 'cost_price', 'sale_price', 'discount_price', 'discount_percentage', 'description', 'product_status_id', 'slug', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],
        'InventoryUniqueProduct' => [
            'table' => 'inventory_unique_products',
            'fillable' => ['serial_no', 'qa_code', 'product_id', 'product_status_id', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],
        'InventoryProductSeo' => [
            'table' => 'inventory_product_seos',
            'fillable' => ['title', 'keywords', 'tags', 'description', 'created_at', 'product_id', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],
        'InventoryProductVariation' => [
            'table' => 'inventory_product_variations',
            'fillable' => ['inventory_option_id', 'inventory_option_value_id', 'product_id', 'description', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],
        'Menu' => [
            'table' => 'menus',
            'fillable' => ['name', 'slug', 'url', 'icon', 'order', 'status', 'parent_id', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],
        'LeaveType' => [
            'table' => 'leave_types',
            'fillable' => ['name', 'slug', 'total','description', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],
        'Leave' => [
            'table' => 'leaves',
            'fillable' => ['consumed', 'user_approval_request_id','remaining', 'start_date', 'end_date','user_id','leave_type', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],
        'LeaveUser' => [
            'table' => 'leave_users',
            'fillable' => ['consumed','user_id','leave_type', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
            'hidden' => ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'],
        ],
    ]

];
