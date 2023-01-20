<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolePoliciesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_policies')->delete();
        
        \DB::table('role_policies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'policy_id' => 1,
                'created_at' => '2023-01-20 15:03:08',
                'updated_at' => '2023-01-20 15:03:08',
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 1,
                'policy_id' => 2,
                'created_at' => '2023-01-20 15:03:08',
                'updated_at' => '2023-01-20 15:03:08',
            ),
            2 => 
            array (
                'id' => 3,
                'role_id' => 1,
                'policy_id' => 3,
                'created_at' => '2023-01-20 15:03:08',
                'updated_at' => '2023-01-20 15:03:08',
            ),
            3 => 
            array (
                'id' => 4,
                'role_id' => 1,
                'policy_id' => 4,
                'created_at' => '2023-01-20 15:03:08',
                'updated_at' => '2023-01-20 15:03:08',
            ),
            4 => 
            array (
                'id' => 5,
                'role_id' => 2,
                'policy_id' => 2,
                'created_at' => '2023-01-20 15:03:08',
                'updated_at' => '2023-01-20 15:03:08',
            ),
        ));
        
        
    }
}