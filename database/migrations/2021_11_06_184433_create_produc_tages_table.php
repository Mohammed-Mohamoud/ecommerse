<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducTagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produc_tages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned()->uniqid();
            $table->bigInteger('tage_id')->unsigned()->uniqid();
            $table->foreign('tage_id')->references('id')->on('tages')
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
        Schema::dropIfExists('produc_tages');
    }
}
