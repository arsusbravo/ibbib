<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('certificates');
        Schema::create('certificates', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->increments('id');
            $table->unsignedBigInteger('crew_id');
            $table->unsignedInteger('language_from')->nullable()->default(NULL);
            $table->unsignedInteger('language_to')->nullable()->default(NULL);
            $table->unsignedInteger('degree_id')->nullable()->default(NULL);
            $table->string('title', 100)->nullable()->default(NULL);
            $table->string('slug', 100)->nullable()->default(NULL);
            $table->mediumText('description')->nullable()->default(NULL);
            $table->integer('issued')->nullable()->default(NULL);
            $table->dateTime('created_at')->nullable()->default(NULL);
            $table->dateTime('updated_at')->nullable()->default(NULL);
            
            $table->foreign('crew_id')->references('id')->on('crews');
            $table->foreign('language_from')->references('id')->on('languages')->onDelete('set null')->onUpdate('set null');
            $table->foreign('language_to')->references('id')->on('languages')->onDelete('set null')->onUpdate('set null');
            $table->foreign('degree_id')->references('id')->on('degrees')->onDelete('set null')->onUpdate('set null');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificates');
    }
}
