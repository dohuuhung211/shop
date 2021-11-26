<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            if (Schema::hasColumn('orders', 'user_id') && Schema::hasTable('users')) {
                Schema::table('orders', function (Blueprint $table) {
                    $table->foreign('user_id')->references('id')->on('users');
                });
            }

            if (Schema::hasColumn('orders', 'customer_id') && Schema::hasTable('customers')) {
                Schema::table('orders', function (Blueprint $table) {
                    $table->foreign('customer_id')->references('id')->on('customers');
                });
            }

            if (Schema::hasColumn('order_items', 'order_id') && Schema::hasTable('orders')) {
                Schema::table('order_items', function (Blueprint $table) {
                    $table->foreign('order_id')->references('id')->on('orders');
                });
            }

        if (Schema::hasColumn('order_items', 'product_id') && Schema::hasTable('products')) {
            Schema::table('order_items', function (Blueprint $table) {
                $table->foreign('product_id')->references('id')->on('products');
            });
        }

        if (Schema::hasColumn('products', 'user_id') && Schema::hasTable('users')) {
            Schema::table('products', function (Blueprint $table) {
                $table->foreign('user_id')->references('id')->on('users');
            });
        }

        if (Schema::hasColumn('products', 'category_id') && Schema::hasTable('categories')) {
            Schema::table('products', function (Blueprint $table) {
                $table->foreign('category_id')->references('id')->on('categories');
            });
        }

        if (Schema::hasColumn('product_images', 'product_id') && Schema::hasTable('products')) {
            Schema::table('product_images', function (Blueprint $table) {
                $table->foreign('product_id')->references('id')->on('products');
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('set_foreign_key');
    }
}
