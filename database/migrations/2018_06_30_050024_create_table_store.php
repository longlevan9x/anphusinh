<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function(Blueprint $table) {
        	$table->increments('id');
        	$table->integer('id_area')->default(0)->nullable();
        	$table->string('street')->nullable();
	        $table->string('name');
	        $table->string('address', 500)->nullable();
	        $table->tinyInteger('is_active')->default(0)->nullable();
	        $table->string('status', 50)->nullable();
	        $table->string('phone', 25)->nullable();
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
