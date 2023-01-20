<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'role' => 'Senior HRD',
                'description' => 'Senior HRD can view, read, edit, add',
                'created_at' => '2023-01-20 15:00:08',
                'updated_at' => '2023-01-20 15:00:08',
            ),
            1 => 
            array (
                'role_id' => 2,
                'role' => 'HRD',
                'description' => 'HRD only view and read',
                'created_at' => '2023-01-20 15:00:08',
                'updated_at' => '2023-01-20 15:00:08',
            ),
        ));
        
        
    }
}