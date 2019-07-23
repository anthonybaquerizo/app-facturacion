<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocioNegocioContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socio_negocio_contactos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("socio_negocio_id");
            $table->foreign("socio_negocio_id")
                ->references("id")
                ->on("socios_negocio")
                ->onUpdate("cascade")
                ->onDelete("cascade");
            $table->unsignedBigInteger("tipo_id");
            $table->foreign("tipo_id")
                ->references("id")
                ->on("tipos_contacto")
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->unsignedBigInteger("contacto_id")->nullable();
            $table->foreign("contacto_id")
                ->references("id")
                ->on("socio_negocio_contactos")
                ->onUpdate("cascade")
                ->onDelete("cascade");
            $table->string("concepto", 100);
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
        Schema::dropIfExists('socio_negocio_contactos');
    }
}
