<?php

use Illuminate\Database\Seeder;

class UserGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_groups')->insert([
	        ['name' => 'Super Administrator', 'description' => 'A person who setup and configure the system.'],
	        ['name' => 'System Administrator', 'description' => 'Administrator who manage all branch.'],
	        ['name' => 'Branch Administrator', 'description' => 'Administrator of a branch.'],
	        ['name' => 'System User', 'description' => 'Users who are staff of the school working under a branch.'],
	        ['name' => 'Teacher', 'description' => null],
	        ['name' => 'Student', 'description' => null],
	        ['name' => 'Guest', 'description' => null],
        ]);
    }
}
