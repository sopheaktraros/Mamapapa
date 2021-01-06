<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRolesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'user_roles', function ( Blueprint $table ) {
            $table->smallIncrements( 'id' )->unsigned();
            $table->smallInteger( 'user_group_id' )->unsigned();
            $table->string( 'name', 100 );
            $table->string( 'description' )->nullable();
            $table->boolean( 'active' )->default( 1 );
            $table->boolean( 'delete' )->default( 0 );
            $table->timestamps();

            $table->foreign('user_group_id')->references('id')->on('user_groups');
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'user_roles' );
    }
}
