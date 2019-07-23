<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TipoContacto extends Model
{

    protected $table = "tipos_contacto";

    protected $primaryKey = "id";

    protected $fillable = [
        "concepto",
        "estado",
    ];

}
