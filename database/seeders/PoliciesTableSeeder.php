<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PoliciesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('policies')->delete();
        
        \DB::table('policies')->insert(array (
            0 => 
            array (
                'policy_id' => 1,
                'policy' => 'candidate.create',
                'description' => 'candidate.create',
                'created_at' => '2023-01-20 15:01:27',
                'updated_at' => '2023-01-20 15:01:27',
            ),
            1 => 
            array (
                'policy_id' => 2,
                'policy' => 'candidate.read',
                'description' => 'candidate.read',
                'created_at' => '2023-01-20 15:01:27',
                'updated_at' => '2023-01-20 15:01:27',
            ),
            2 => 
            array (
                'policy_id' => 3,
                'policy' => 'candidate.update',
                'description' => 'candidate.update',
                'created_at' => '2023-01-20 15:01:27',
                'updated_at' => '2023-01-20 15:01:27',
            ),
            3 => 
            array (
                'policy_id' => 4,
                'policy' => 'candidate.delete',
                'description' => 'candidate.delete',
                'created_at' => '2023-01-20 15:01:27',
                'updated_at' => '2023-01-20 15:01:27',
            ),
        ));
        
        
    }
}