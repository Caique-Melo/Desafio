<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_categoria_produto');
            $table->dateTime('data_cadastro');
            $table->String('nome_produto',150);
            $table->float('valor_produto',10,2);
            $table->bigInteger('id_planejamento')->unsigned();
            $table->foreign('id_planejamento')->references('id_categoria_planejamento')->on('categoria_produtos')->onDelete('cascade')->unsigned()->index();
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
        Schema::dropIfExists('produtos');
    }
}
