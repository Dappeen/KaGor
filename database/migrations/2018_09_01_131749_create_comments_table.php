<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id') ->unsigned();
            $table->foreign('user_id')  ->references('id')
                  ->on('users')
                  ->onDelete('CASCADE')
                  ->onUpdate('RESTRICT');
            $table->integer('product_id') ->unsigned();
            $table->foreign('product_id')  ->references('id')
                  ->on('products')
                  ->onDelete('CASCADE')
                  ->onUpdate('RESTRICT');
            $table->text('content');
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
        Schema::dropIfExists('comments');
    }
}
