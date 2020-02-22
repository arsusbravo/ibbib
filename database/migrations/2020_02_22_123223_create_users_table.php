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
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->bigIncrements('id');
            $table->string('name', 255)->nullable()->default(NULL)->unique();
            $table->string('email', 255)->nullable()->default(NULL);
            $table->unsignedInteger('role_id');
            $table->dateTime('email_verified_at')->nullable()->default(NULL);
            $table->string('password', 255)->nullable()->default(NULL);
            $table->string('remember_token', 100)->nullable()->default(NULL);
            $table->boolean('active')->nullable()->default(NULL);
            $table->dateTime('created_at')->nullable()->default(NULL);
            $table->dateTime('updated_at')->nullable()->default(NULL);

            $table->foreign('role_id')->references('id')->on('roles');
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
