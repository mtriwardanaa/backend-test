<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CandidatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('candidates')->delete();
        
        \DB::table('candidates')->insert(array (
            0 => 
            array (
                'candidate_id' => 1,
                'name' => 'smith',
                'email' => 'smith@gmail.com',
                'phone' => '085123456789',
                'education' => 'UGM Yogyakarta',
                'birthday' => '1991-01-19',
                'experience' => '5',
                'last_position' => 'CEO',
                'applied_position' => 'Senior PHP Developer',
                'top_5_skills' => 'Laravel, Mysql, PostgreSQL, Code Igniter, Java',
                'resume' => 'test',
                'created_by' => 1,
                'created_at' => '2023-01-20 15:50:36',
                'updated_at' => '2023-01-20 15:50:36',
            ),
        ));
        
        
    }
}