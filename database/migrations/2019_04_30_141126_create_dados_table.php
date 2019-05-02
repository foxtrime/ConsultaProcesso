<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados', function (Blueprint $table) {
            $table->increments('id');
            $table->char('cpf',11);
            $table->char('processo',11);
            $table->string('nome_contribuinte');
            $table->string('endereco_visita');
            $table->date('data');
            $table->time('hora');
            $table->enum('status',['Não Validado','Validado']);
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
        Schema::dropIfExists('dados');
    }
}
