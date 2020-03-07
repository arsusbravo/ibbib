<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->increments('id');
            $table->unsignedInteger('role_id');
            $table->string('title', 100)->nullable()->default(NULL);
            $table->string('slug', 100)->nullable()->default(NULL);
            $table->mediumText('description')->nullable()->default(NULL);
            $table->decimal('price', 10, 2)->nullable()->default(NULL);
            $table->integer('quantity')->nullable()->default(NULL);
            $table->string('unit', 50)->nullable()->default(NULL);
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
        Schema::dropIfExists('prices');
    }
}
