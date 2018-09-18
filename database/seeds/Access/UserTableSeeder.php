<?php

use Carbon\Carbon as Carbon;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class UserTableSeeder.
 */
class UserTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate(config('access.users_table'));

        //Add the master administrator, user id of 1
        $users = [
            [
                'full_name' => 'Viral',
                'email' => 'admin@admin.com',
                'mobile' => '3234225990',
                'country_code' => '92',
                'password' => bcrypt('1234'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed' => true,
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'full_name' => 'Vipul',
                'email' => 'executive@executive.com',
                'mobile' => '3234225991',
                'password' => bcrypt('1234'),
                'country_code' => '92',
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed' => true,
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'full_name' => 'User',
                'email' => 'user@user.com',
                'mobile' => '3234225992',
                'password' => bcrypt('1234'),
                'country_code' => '92',
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed' => true,
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
        ];

        DB::table(config('access.users_table'))->insert($users);
    }
}
