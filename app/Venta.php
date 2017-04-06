<?php

namespace sccventas;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
  protected $table = 'ventas';

/**
 * The attributes that are mass assignable.
 *
 * @var array
 */
protected $fillable = ['FEC_VEN','FAC_VEN','ID_CLI','ID_USU'];

/**
 * The attributes excluded from the model's JSON form.
 *
 * @var array
 */
protected $guarded =['id'];
}
