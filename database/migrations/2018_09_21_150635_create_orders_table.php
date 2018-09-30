<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->timestamps();
        });

        Schema::create('item_order', function (Blueprint $table) {
           // $table->increments( 'id' , true , true );
            $table->integer('item_id');
            $table->integer('order_id');
            $table->integer('amount');
            $table->primary(['item_id','order_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('item_order');
    }
}
