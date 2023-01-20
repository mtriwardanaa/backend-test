<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PoliciesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RolePoliciesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(OauthClientsTableSeeder::class);
        $this->call(CandidatesTableSeeder::class);
    }
}
