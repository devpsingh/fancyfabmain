<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('email');
            $table->string('shipping_info_id');
            $table->string('billing_info_id')->nullable();
            $table->text('product_info');
            $table->string('coupon_code')->nullable();
            $table->integer('shipping_charges');
            $table->integer('product_qty');
            $table->integer('discount_value')->nullable();
            $table->integer('order_value');
            $table->boolean('order_status')->default(0);
            $table->string('order_id')->nullable();
            $table->string('payment_mode');
            $table->string('stripe_id')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
