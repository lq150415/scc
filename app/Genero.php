<?php

namespace sccventas;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = 'genero';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['titulo','activo'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded =['id'];
}
