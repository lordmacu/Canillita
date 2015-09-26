<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
	const INGRESO = 1;
	const VENTA = 2;
	
	public $fillable = [
		'tipo',
		'revista_id',
		'edicion',
		'vendedor_id',
		'waypoint',
		'lat',
		'lang',
		'localidad',
		'distribuidora',
		'linea',
		'cantidad',
	];
}
