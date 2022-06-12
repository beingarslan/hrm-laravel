<?php

namespace Database\Seeders\ApprovalStatus;

use App\Models\Approval\ApprovalStatus;
use Illuminate\Database\Seeder;

class ApprovalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            [
                'name' => 'Pending',
                'description' => 'Pending',
                'slug' => 'pending'
            ],
            [
                'name' => 'Approved',
                'description' => 'Approved',
                'slug' => 'approved'
            ],
            [
                'name' => 'Rejected',
                'description' => 'Rejected',
                'slug' => 'rejected'
            ]
        ];

        ApprovalStatus::insert($status);
    }
}
