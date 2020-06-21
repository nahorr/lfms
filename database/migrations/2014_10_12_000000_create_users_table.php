<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');   
            $table->string('name');
            $table->integer('group_id')->unsigned();
            //$table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('lawyer_deleted_at')->nullable();
            $table->string('password');
            /*$table->boolean('is_user')->default(false);
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_lawyer')->default(false);*/
            $table->string('designation')->nullable();
            //$table->boolean('is_superadmin')->default(false);
            $table->string('avatar')->default('default.jpg');
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
