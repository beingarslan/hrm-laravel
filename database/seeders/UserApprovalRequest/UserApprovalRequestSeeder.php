<?php

namespace Database\Seeders\UserApprovalRequest;

use App\Models\Approval\ApprovalStatus;
use App\Models\Approval\ApprovalType;
use App\Models\User\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserApprovalRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(7);
        $supervisor_id = $user->supervisor_id;

        $faker = Factory::create();

        $approval_type = ApprovalType::all();
        $approval_status = ApprovalStatus::all();
        for ($i = 0; $i < rand(10, 15); $i++) {
            $approval_request = $user->approvals()->create([
                'title' => $faker->sentence,
                'approval_type_id' => $approval_type->random()->id,
                // 'approval_date' => $faker->dateTimeBetween('-1 month', '+1 month'),
                'supervisor_id' => $supervisor_id,
                'approval_status_id' => $approval_status->random()->id,
            ]);

            for ($j = 0; $j < rand(1, 5); $j++) {
                $approval_request->comments()->create([
                    'comment' => $faker->sentence,
                    'created_by' => rand(0, 1) ? $supervisor_id : $user->id,
                ]);
            }
        }
    }
}
