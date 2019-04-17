<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormManagerFormAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_manager_form_attributes', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('form_id');
            $table->foreign('form_id')->references('id')->on('form_manager_forms')->onUpdate('cascade')->onDelete('restrict');

            $table->string('attribute');
            $table->string('value');

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
        Schema::dropIfExists('form_manager_form_attributes');
    }
}
