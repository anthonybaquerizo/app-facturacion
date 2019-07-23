<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("socio_negocio_id");
            $table->foreign("socio_negocio_id")
                ->references("id")
                ->on("socios_negocio")
                ->onUpdate("cascade")
                ->onDelete("cascade");
            $table->string("usuario", 50);
            $table->string("contrasenia", 100);
            $table->string("idioma", 5)->default("es");
            $table->boolean("estado")->default(1);
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
        Schema::dropIfExists('usuarios');
    }
}
