<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riego extends Model
{
	protected $table = 'riegos';
    protected $fillable = ['nombre', 'tipo', 'descripcion', 'intervalo', 'tiempo','estado'];
    protected $casts = ['created_at' => 'datetime'];


}
