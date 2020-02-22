<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crews', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('country_id')->nullable()->default(NULL);
            $table->string('co_name', 100)->nullable()->default(NULL);
            $table->string('co_phone', 50)->nullable()->default(NULL);
            $table->string('objective', 100)->nullable()->default(NULL);
            $table->mediumText('resume')->nullable()->default(NULL);
            $table->mediumText('additional_info')->nullable()->default(NULL);
            $table->decimal('standard_rates', 10, 2)->nullable()->default(NULL);
            $table->string('unit_rate', 50)->nullable()->default(NULL);
            $table->integer('credits')->nullable()->default(NULL);
            $table->boolean('newsletter')->nullable()->default(NULL);
            $table->dateTime('created_at')->nullable()->default(NULL);
            $table->dateTime('updated_at')->nullable()->default(NULL);
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null')->onUpdate('set null');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crews');
    }
}
