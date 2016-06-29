<?php

namespace sccventas;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $table = 'archivo';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['titulo','descripcion','activo'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded =['id'];
}
