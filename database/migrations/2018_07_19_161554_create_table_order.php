<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function(Blueprint $table) {
        	$table->increments('id');
        	$table->integer('product_id');
        	$table->string('name')->nullable();
        	$table->string('phone', 20)->nullable();
        	$table->string('address', 500)->nullable();
        	$table->integer('quantity')->default(0);
        	$table->float('price', 10)->default(0);
        	$table->float('total_price', 10)->default(0);
        	$table->ipAddress('ipv4')->nullable();
        	$table->string('city')->nullable();
        	$table->tinyInteger('is_active')->default(0);
        	$table->string('status')->default(0);
        	$table->text('note')->nullable();
	        $table->integer('author_updated_id')->default(0);
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
