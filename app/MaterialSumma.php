<?php

namespace sccventas;

use Illuminate\Database\Eloquent\Model;

class MaterialSumma extends Model
{
     protected $table = 'materialsumma';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['NOM_MSU','PRE_MSU','ID_MAT'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded =['id'];
}
