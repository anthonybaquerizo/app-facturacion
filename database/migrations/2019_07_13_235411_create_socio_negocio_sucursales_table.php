<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocioNegocioSucursalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socio_negocio_sucursales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("socio_negocio_id");
            $table->foreign("socio_negocio_id")
                ->references("id")
                ->on("socios_negocio")
                ->onUpdate("cascade")
                ->onDelete("cascade");
            $table->unsignedBigInteger("sucursal_id");
            $table->foreign("sucursal_id")
                ->references("id")
                ->on("sucursales")
                ->onUpdate("cascade")
                ->onDelete("restrict");
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
        Schema::dropIfExists('socio_negocio_sucursales');
    }
}
