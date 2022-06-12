<?php

namespace App\Console\Commands;

use App\Models\User\User;
use App\Models\User\UserAttendance;
use Illuminate\Console\Command;

class SignOutAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'signout:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Signout all users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $attendence = UserAttendance::where('logout', null)?->update([
            'logout' => now(),
            'duration' => now()->diffInSeconds(UserAttendance::where('logout', null)->first()?->login)
        ]);
        $this->info('All users signed out');
    }
}
