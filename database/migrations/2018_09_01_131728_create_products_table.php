<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id') ->unsigned();
          $table->foreign('user_id')  ->references('id')
                ->on('users')
                ->onDelete('CASCADE')
                ->onUpdate('RESTRICT');
          $table->integer('statuses_id') ->unsigned();
          $table->foreign('statuses_id') ->references('id')
                  ->on('statuses')
                  ->onDelete('CASCADE')
                  ->onUpdate('RESTRICT');
          $table->string('description', 191);
          $table->decimal('price', 65, 2);
          $table->string('name', 191)->unique();
          $table->rememberToken();
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
        Schema::dropIfExists('products');
    }
}
