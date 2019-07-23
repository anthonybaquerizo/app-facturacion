<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{

    protected $table = "operaciones";

    protected $primaryKey = "id";

    protected $fillable = [
        "concepto",
        "ope_ver",
        "ope_crear",
        "ope_editar",
        "ope_eliminar",
        "estado",
    ];

}
