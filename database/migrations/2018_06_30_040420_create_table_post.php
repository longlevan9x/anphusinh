<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function(Blueprint $table) {
        	$table->increments('id');
        	$table->integer('author_id')->default(0);
        	$table->integer('parent_id')->default(0)->nullable();
        	$table->string('title');
        	$table->string('slug')->nullable();
	        $table->integer('category_id')->default(0);
        	$table->string('image')->nullable();
        	$table->tinyInteger('is_active')->default(0);
        	$table->dateTime('post_time')->nullable();
        	$table->string('type',50)->nullable();
	        $table->string('overview', 1000)->nullable();
	        $table->text('content')->nullable();
	        $table->string('status', 30)->nullable();
	        $table->integer('author_updated_id')->default(0);
        	$table->timestamps();
        	$table->unique(['title', 'type']);
        	$table->unique(['title', 'slug', 'type']);
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
