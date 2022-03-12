<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->decimal('price')->nullable();
            $table->string('attribute')->nullable();
            $table->bigInteger('product_id')->unsigned()->uniqid();
            $table->string('photo')->nullable();
            $table->bigInteger('attribute_id')->unsigned()->uniqid()->nullable();
            $table->foreign('attribute_id')->references('id')->on('attributes')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
    }
}
