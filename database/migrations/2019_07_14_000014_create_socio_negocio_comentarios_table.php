<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocioNegocioComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socio_negocio_comentarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("socio_negocio_id");
            $table->foreign("socio_negocio_id")
                ->references("id")
                ->on("socios_negocio")
                ->onUpdate("cascade")
                ->onDelete("cascade");
            $table->unsignedBigInteger("usuario_id");
            $table->foreign("usuario_id")
                ->references("id")
                ->on("usuarios")
                ->onUpdate("cascade")
                ->onDelete("cascade");
            $table->text("comentario");
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
        Schema::dropIfExists('socio_negocio_comentarios');
    }
}
