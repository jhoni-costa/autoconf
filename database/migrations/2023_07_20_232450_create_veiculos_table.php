<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->text('descricao');
            $table->unsignedBigInteger('id_marca');
            $table->unsignedBigInteger('id_modelo');
            $table->double('preco');
            $table->string('cor');
            $table->string('ano_fabricacao', 10);
            $table->string('ano_modelo', 10);
            $table->string('placa',10);
            $table->string('quilometragem');
            ## 1 = Ativo | 0 = Inativo
            $table->boolean("ativo")->default(1);
            $table->timestamps();

            $table->foreign('id_marca')->references('id')->on('marcas');
            $table->foreign('id_modelo')->references('id')->on('modelos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veiculos');
    }
}
