<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Se insertan
        $now = \Illuminate\Support\Carbon::now();
        DB::table("tipos_documento")->insert([
            ["concepto" => "Menores a 700 SOLES", "codigo_sunat" => "-", "estado" => 1, "created_at" => $now],
            ["concepto" => "Doc.trib.no.dom.sin.ruc", "codigo_sunat" => "0", "estado" => 1, "created_at" => $now],
            ["concepto" => "Doc. Nacional de identidad", "codigo_sunat" => "1", "estado" => 1, "created_at" => $now],
            ["concepto" => "Carnet de extranjería", "codigo_sunat" => "4", "estado" => 1, "created_at" => $now],
            ["concepto" => "Registro Único de contribuyentes", "codigo_sunat" => "6", "estado" => 1, "created_at" => $now],
            ["concepto" => "Pasaporte", "codigo_sunat" => "7", "estado" => 1, "created_at" => $now],
            ["concepto" => "Ced. Diplomática de identidad", "codigo_sunat" => "A", "estado" => 1, "created_at" => $now],
        ]);
    }
}
