<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->length(20)->unsigned();
            $table->integer('customer_id');
            $table->string('name', 191)->unique();
            $table->text('description');
            $table->decimal('price', 10, 2)->default(0);
            $table->integer('stock')->unsigned()->default(0);
            $table->integer('approved')->unsigned()->default(0);
            $table->string('image_url', 191)->unique();
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
        Schema::dropIfExists('wines');
    }
}
