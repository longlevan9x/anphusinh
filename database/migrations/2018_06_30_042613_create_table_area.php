<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableArea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function(Blueprint $table) {
        	$table->increments('id');
        	$table->integer('parent_id')->default(0);
        	$table->string('name');
        	$table->string('slug')->nullable();
        	$table->tinyInteger('is_active');
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
        //
    }
}
