<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('trainer_id')->nullable();
            $table->string('name');
            $table->boolean('gender')->comment('1 = male, 2 = female')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->text('address')->nullable();
            $table->text('facebook_link')->nullable();
            $table->string('password');
            $table->text('image_profile')->nullable();
            $table->decimal('balance',19,2)->default(0)->nullable();
            $table->string('pay_password')->nullable();
            $table->text('remark')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('delete')->default(0);
            $table->date('date_sign_up');
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
        Schema::dropIfExists('customers');
    }
}
