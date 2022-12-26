<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVisitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_visit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visit_id'); 
            $table->foreign('visit_id')->references('id')->on('visits')->onDelete('cascade'); 
            $table->unsignedBigInteger('product_id'); 
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); 
            $table->string('dose');
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
        Schema::dropIfExists('product_visit');
    }
}
