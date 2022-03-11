<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['id_categoria_produto','data_cadastro','nome_produto','valor_produto','id_planejamento','nome_categoria'];
}
