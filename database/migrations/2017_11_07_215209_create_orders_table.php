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
             $table->string('nazwa');
             $table->decimal('kosztCalkowity');
             $table->date('terminRealizacji')->nullable();
             $table->date('dataRealizacji')->nullable();
             $table->integer('klient_id');
             $table->timestamps();

             $table->foreign('klient_id')->references('id')->on('customers');
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
