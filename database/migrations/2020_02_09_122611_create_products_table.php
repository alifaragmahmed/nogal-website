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
            $table->bigIncrements('id');
            $table->string('name_en');
            $table->string('name_ar')->nullable(); 
            $table->float('price_en');
            $table->float('price_ar');
            $table->string('description_en')->nullable(); 
            $table->string('description_ar')->nullable(); 
            $table->boolean('active')->default(1);
            $table->integer('amount')->default(0);
            $table->integer('category_id')->nullable();
            $table->string('keywords')->nullable(); 
            $table->boolean('is_pay')->default(0);
            $table->float('shipping_price')->default(0);
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
        Schema::dropIfExists('products');
    }
}
