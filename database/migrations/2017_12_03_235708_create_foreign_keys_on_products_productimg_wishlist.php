<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeysOnProductsProductimgWishlist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function($table) {
            $table->engine = 'InnoDB';
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });

        Schema::table('ProductImg', function($table) {
            $table->engine = 'InnoDB';
            $table->foreign('product_id')
                    ->references('id')->on('products')
                    ->onDelete('cascade');
        });

        Schema::table('wishlist', function($table) {
            $table->engine = 'InnoDB';
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
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
