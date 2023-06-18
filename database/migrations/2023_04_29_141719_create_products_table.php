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
            $table->string("name");
            $table->text("description");
            $table->double("price");
            $table->double("min_price");
            $table->double("max_price");
            $table->double("increase_ratio");
            $table->double("repeat_times");
            $table->tinyInteger("is_new")->default(0);
            $table->tinyInteger("is_on_sale")->default(0);
            $table->tinyInteger("is_new_arrival")->default(0);
            $table->tinyInteger("is_best_seller")->default(0);
            $table->foreignId("category_id")->constrained();
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('set null');
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
