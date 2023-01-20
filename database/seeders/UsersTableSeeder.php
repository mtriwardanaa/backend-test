<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'user_id' => 1,
                'name' => 'Mr. John',
                'email' => 'john@email.com',
                'password' => '$2a$12$5Xytddki4Cd0bvnL7Umo3.XxkDU88ChTdvJQhWr0CPIvOoxVawDnG',
                'role_id' => 1,
                'remember_token' => NULL,
                'created_at' => '2023-01-20 15:04:20',
                'updated_at' => '2023-01-20 15:04:20',
            ),
            1 => 
            array (
                'user_id' => 2,
                'name' => 'Mrs. Lee',
                'email' => 'lee@email.com',
                'password' => '$2a$12$5Xytddki4Cd0bvnL7Umo3.XxkDU88ChTdvJQhWr0CPIvOoxVawDnG',
                'role_id' => 2,
                'remember_token' => NULL,
                'created_at' => '2023-01-20 15:04:20',
                'updated_at' => '2023-01-20 15:04:20',
            ),
        ));
        
        
    }
}