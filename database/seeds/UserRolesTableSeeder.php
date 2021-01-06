<?php

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
	        ['name' => "Super Admin", 'user_group_id' => 1],
	        ['name' => "Admin", 'user_group_id' => 2],
	        ['name' => "Branch Admin", 'user_group_id' => 3],
	        ['name' => "Academic Manager", 'user_group_id' => 4],
	        ['name' => "Accountant", 'user_group_id' => 4],
	        ['name' => "Teacher", 'user_group_id' => 5],
        ]);
    }
}
