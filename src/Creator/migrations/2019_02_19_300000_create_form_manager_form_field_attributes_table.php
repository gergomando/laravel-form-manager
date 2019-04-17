<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormManagerFormFieldAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_manager_form_field_attributes', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('field_id');
            $table->foreign('field_id')->references('id')->on('form_manager_form_fields')->onUpdate('cascade')->onDelete('restrict');

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
        Schema::dropIfExists('form_manager_form_field_attributes');
    }
}
