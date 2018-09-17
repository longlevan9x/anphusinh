<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration
{
	/**
	 * Run the migrations.
	 * @return void
	 */
	public function up() {
		Schema::create('slides', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 150)->nullable();
			$table->string('description')->nullable();
			$table->string('url')->nullable();
			$table->string('image')->nullable();
			$table->tinyInteger('is_active')->default(0);
			$table->integer('author_id')->default(0);
			$table->integer('author_update_id')->default(0);
			$table->integer('sort_order')->default(0)->length(3);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('slides');
	}
}
