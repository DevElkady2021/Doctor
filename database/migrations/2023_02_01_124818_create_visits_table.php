<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('patient_id'); 
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade'); 
            $table->unsignedBigInteger('doctor_id'); 
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade'); 
            $table->text('note')->nullable();
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
        Schema::dropIfExists('visits');
    }
}
