<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    
	protected $table = 'plantas';
    protected $fillable = ['id','variedad','Descripcion','total','estado','observaciones'];
    protected $casts = ['created_at' => 'datetime'];



}
