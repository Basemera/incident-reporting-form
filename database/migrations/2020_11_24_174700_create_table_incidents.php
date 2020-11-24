<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableIncidents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_incidents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->index()->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->delete('cascade');
            $table->bigInteger('product_version')->index()->unsigned()->default(1);
            $table->timestamp('date_created')->nullable();
            $table->longText('description')->nullable();
            $table->longText('lessons_learned')->nullable();
            $table->longText('assurance')->nullable();

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
        Schema::dropIfExists('table_incidents');
    }
}
