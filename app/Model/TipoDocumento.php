<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{

    protected $table = "tipos_documento";

    protected $primaryKey = "id";

    protected $fillable = [
        "concepto",
        "codigo_sunat"
    ];

}
