<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revista extends Model
{
	public $fillable = [
		'nombre',
		'edicion',
		'url',
	];
}
