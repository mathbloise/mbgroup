<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['id', 'codigo', 'nome', 'preco_unitario'];
    protected $guarded = ['id', 'created_at', 'update_at'];
	protected $table = 'produto';
}