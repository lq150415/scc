<?php

namespace sccventas;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
     protected $table = 'categorias';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['NOM_CAT','DES_CAT','ID_USU'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded =['id'];}
