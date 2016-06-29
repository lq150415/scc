<?php

namespace sccventas;

use Illuminate\Database\Eloquent\Model;

class Procedencia extends Model
{
    protected $table = 'procedencias';

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
