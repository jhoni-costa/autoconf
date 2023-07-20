<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeiculoFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculo_fotos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_veiculo');
            $table->string('nome');
            $table->string('url');
            ## 1 = Ativo | 0 = Inativo
            $table->boolean("ativo")->default(1);
            $table->timestamps();

            $table->foreign('id_veiculo')->references('id')->on('veiculos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veiculo_fotos');
    }
}
