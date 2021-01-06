<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPermissionRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_permission_roles', function (Blueprint $table) {
            $table->smallInteger('role_id')->unsigned();
            $table->smallInteger('permission_id')->unsigned();
            $table->boolean('read')->default(0);
            $table->boolean('write')->default(0);
            $table->boolean('delete')->default(0);
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('user_roles');
            $table->foreign('permission_id')->references('id')->on('user_permissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_permission_roles');
    }
}
