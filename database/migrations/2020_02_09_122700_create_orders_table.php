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
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->string('first_name'); 
            $table->string('last_name'); 
            $table->string('zipcode'); 
            $table->string('city'); 
            $table->string('email'); 
            $table->string('phone'); 
            $table->float('total'); 
            $table->float('discount')->default(0); 
            $table->float('additional')->default(0);  
            $table->string('visa'); 
            $table->boolean('paid')->default(0); 
            $table->string('address')->nullable(); 
            $table->softDeletes();
          
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
