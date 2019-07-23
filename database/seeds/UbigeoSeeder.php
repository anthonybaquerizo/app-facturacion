<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UbigeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Se insertan
        DB::table("ubigeos")->insert([
            ["id" => "9589", "nombre" => "Perú", "estado" => 1],
            ["id" => "9589150101", "nombre" => "Perú", "estado" => 1],
        ]);
    }
}
