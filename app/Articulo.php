<?php

namespace sccventas;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
     protected $table = 'articulos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['TIT_ART','PRE_ART','ID_CAT','ID_MAT'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded =['id'];
}
