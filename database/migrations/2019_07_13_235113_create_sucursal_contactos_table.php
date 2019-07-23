<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSucursalContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursal_contactos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("socio_negocio_id");
            $table->foreign("socio_negocio_id")
                ->references("id")
                ->on("socios_negocio")
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->unsignedBigInteger("tipo_id");
            $table->foreign("tipo_id")
                ->references("id")
                ->on("tipos_contacto")
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->unsignedBigInteger("contacto_id");
            $table->foreign("contacto_id")
                ->references("id")
                ->on("sucursal_contactos")
                ->onUpdate("cascade")
                ->onDelete("restrict");
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
        Schema::dropIfExists('sucursal_contactos');
    }
}
