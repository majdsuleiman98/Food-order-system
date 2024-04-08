<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('meal_id')->unsigned();
            $table->integer('quantity')->default(0);
            $table->integer('price');
            $table->timestamps();

            // $table->unsignedInteger('order_id');
            // $table->unsignedInteger('meal_id');
            //$table->foreign(['order_id','meal_id'])->references(['id','id'])->on(['orders','meals'])->onDelete(['cascade','cascade']);



            //$table->foreignId('order_id')->unsigned()->constrained('orders')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
};
