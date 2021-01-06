<?php

use Illuminate\Database\Seeder;

class UserPermissionRoleTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $permission = new UserPermissionsTableSeeder();

        for ( $i = 0; $i < count( $permission->getPermissions() ); $i ++ ) {
            DB::table( 'user_permission_roles' )->insert([
	            'role_id' => 2,
	            'permission_id' => $i + 1,
	            'read' => 1,
	            'write' => 1,
	            'delete' => 1,
            ]);

	        DB::table('user_permission_roles')->insert([
		        'role_id' => 3,
		        'permission_id' => $i + 1,
		        'read' => 1,
		        'write' => 1,
		        'delete' => 1,
	        ]);

	        DB::table('user_permission_roles')->insert([
		        'role_id' => 4,
		        'permission_id' => $i + 1,
		        'read' => 1,
		        'write' => 1,
		        'delete' => 0,
	        ]);
        }
    }
}
