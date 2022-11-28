<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comanda_produto', function (Blueprint $table) {
            $table->timestamps();
            $table->id();
            $table->unsignedBigInteger('id_produto')->unsigned();
            $table->foreign('id_produto')->references('id')->on('produto')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_comanda')->unsigned();
            $table->foreign('id_comanda')->references('id')->on('comanda')->onUpdate('cascade')->onDelete('cascade');
            $table->double('valor');
            $table->integer('qtde');
            $table->integer('valor_pago');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comanda_produto');
    }
};
