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
            $table->integer('products_count');
            $table->double('order_price');
            $table->double('shipping_price')->default(0);
            $table->double('discount')->default(0);
            $table->double('total_price');
            $table->string('coupon_code', 100);
            $table->text('note');
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('store_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('shipping_address_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('coupon_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('status'  ,['pending' , 'accept' , 'reject' , 'done' , 'shipping'])->default('pending');
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
