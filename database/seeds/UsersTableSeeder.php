<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
	        [
		        'name' => "Admin",
		        'username' => 'admin',
		        'email' => "admin@gmail.com",
		        'password' => bcrypt('123@123'),
		        'role_id' => 1,
		        'branch_id' => 1
	        ]
        ]);
    }
}
