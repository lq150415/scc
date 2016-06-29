<?php

namespace sccventas;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table = 'prestamos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['NOM_PRE','MAT_PRE','FIN_PRE','FFN_PRE','OBS_PRE','EST_PRE','ID_USU'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded =['id'];
}