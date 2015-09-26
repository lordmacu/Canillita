<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RevistaStock extends Model
{
	public $fillable = ['waypoint', 'revista_id', 'edicion', 'stock'];
}
