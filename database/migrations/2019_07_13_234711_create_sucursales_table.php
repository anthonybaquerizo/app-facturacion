<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSucursalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("empresa_id");
            $table->foreign("empresa_id")
                ->references("id")
                ->on("empresas")
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->string("ubigeo_id", 30);
            $table->foreign("ubigeo_id")
                ->references("id")
                ->on("ubigeos")
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->string("codigo_sunat", 4)->default("0000");
            $table->string("nombre", 100);
            $table->text("direccion");
            $table->string("urbanizacion", 10)->nullable();
            $table->text("direccion_completa");
            $table->text("informacion_adicional");
            $table->boolean("estado");
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
        Schema::dropIfExists('sucursales');
    }
}
