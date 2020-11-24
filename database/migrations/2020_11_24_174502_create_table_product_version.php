<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProductVersion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_product_version', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_version')->index()->default(1);
            $table->bigInteger('product_id')->index()->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->delete('cascade');
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
        Schema::dropIfExists('table_product_version');
    }
}
