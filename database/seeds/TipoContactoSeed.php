<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoContactoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Se insertan
        DB::table("tipos_contacto")->insert([
            ["concepto" => "Contacto", "estado" => 1],
            ["concepto" => "Teléfono", "estado" => 1],
            ["concepto" => "Celular", "estado" => 1],
            ["concepto" => "Email", "estado" => 1],
            ["concepto" => "información Adicional", "estado" => 1],
        ]);
    }
}
