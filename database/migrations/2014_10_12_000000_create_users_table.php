<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->smallInteger( 'role_id' )->nullable();
            $table->smallInteger('branch_id');
            $table->decimal('balance',19,2)->default(0)->nullable();
	        $table->boolean( 'active' )->default(1);
	        $table->boolean( 'delete' )->default(0);
	        $table->smallInteger('created_by')->nullable();
	        $table->smallInteger('updated_by')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
