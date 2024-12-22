<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MigrateStaffToUsers extends Command
{
    protected $signature = 'migrate:staff-to-users';
    protected $description = 'Migrate data from staff table to users table';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $staff = DB::table('staff')->get();

        foreach ($staff as $member) {
            User::updateOrCreate(
                ['email' => $member->email],
                [
                    'name' => $member->first_name . ' ' . $member->surname,  // Combine first and surname for name
                    'first_name' => $member->first_name,
                    'surname' => $member->surname,
                    'dob' => $member->dob,
                    'password' => Hash::make($member->password),  // Assuming password needs to be hashed
                    'permission_level' => $member->permission_level,
                    'job_role' => $member->job_role,
                ]
            );
        }

        $this->info('Staff data migrated to users table successfully.');
    }
}
