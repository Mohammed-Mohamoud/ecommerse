<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->bigInteger('barnd_id')->nullable()->unsigned();
            $table->string('name')->nullable();
            $table->decimal('price')->nullable();
            $table->string('photo')->nullable();
            $table->string('price_type')->nullable();
            $table->decimal('special_price')->nullable();
            $table->date('price_star')->nullable();
            $table->date('price_end')->nullable();
            $table->decimal('selling')->nullable();
            $table->integer('quantity')->nullable();
            $table->boolean('is_active')->nullable();
            $table->integer('viewed')->nullable()->default(0);
            $table->text('description')->nullable();
            $table->foreign('barnd_id')->references('id')->on('brands')
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
        Schema::dropIfExists('products');
    }
}
