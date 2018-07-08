<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduct extends Migration
{
	/**
	 * Run the migrations.
	 * @return void
	 */
	public function up() {
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('author_id')->default(0)->nullable();
			$table->string('image')->nullable();
			$table->string('name')->unique();
			$table->string('slug')->nullable();
			$table->integer('category_id')->default(0)->nullable();
			$table->float('price')->default(0)->nullable();
			$table->float('price_sale')->default(0)->nullable();
			$table->integer('quantity')->default(0)->nullable();
			$table->tinyInteger('is_active')->default(0)->nullable();
			$table->string('status', 50)->default(0)->nullable();
			$table->string('content')->nullable();
			$table->string('overview', 1000)->nullable();
			$table->dateTime('post_time')->nullable();
			$table->string('post_type', 30)->nullable();
			$table->integer('admin_id')->default(0)->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 * @return void
	 */
	public function down() {
		//
	}
}
