<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parcela extends Model
{
    
    protected $table = 'parcelas';
    protected $fillable = ['numero', 'variedad', 'tipo', 'enabled', 'name'];
    protected $casts = ['created_at' => 'datetime','enabled' => '','name' => ''];


}
