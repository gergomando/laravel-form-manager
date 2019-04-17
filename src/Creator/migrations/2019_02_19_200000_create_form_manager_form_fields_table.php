<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormManagerFormFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_manager_form_fields', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('form_id');
            $table->foreign('form_id')->references('id')->on('form_manager_forms')->onUpdate('cascade')->onDelete('restrict');

            $table->string('type');
            $table->string('name');
            $table->string('label')->nullable();

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
        Schema::dropIfExists('form_manager_form_fields');
    }
}
