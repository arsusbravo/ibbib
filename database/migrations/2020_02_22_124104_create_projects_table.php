<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('crew_id')->default(NULL)->nullable();
            $table->unsignedBigInteger('skill_id');
            $table->string('title', 100)->nullable()->default(NULL);
            $table->string('slug', 100)->nullable()->default(NULL);
            $table->mediumText('content')->nullable()->default(NULL);
            $table->boolean('deleted')->nullable()->default(1);
            $table->boolean('published')->nullable()->default(NULL);
            $table->dateTime('published_at')->nullable()->default(NULL);
            $table->dateTime('deadline')->nullable()->default(NULL);
            $table->dateTime('created_at')->nullable()->default(NULL);
            $table->dateTime('updated_at')->nullable()->default(NULL);

            $table->foreign('crew_id')->references('id')->on('crews')->onDelete('set null')->onUpdate('set null');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('skill_id')->references('id')->on('skills');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
