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
            $table->enum('hora',['Manhã - 09:00 as 12:00 Horas','Tarde - 12:00 as 17:00 Horas']);
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
