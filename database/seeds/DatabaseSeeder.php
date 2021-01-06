<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserGroupsTableSeeder::class,
        	UserPermissionsTableSeeder::class,
	        UserRolesTableSeeder::class,
	        UserPermissionRoleTableSeeder::class,
	        UsersTableSeeder::class,
            SettingsTableSeeder::class,
        ]);
    }
}
