<?php

namespace sccventas;

use Illuminate\Database\Eloquent\Model;

class Hoja extends Model
{
  protected $table = 'hoja';

/**
 * The attributes that are mass assignable.
 *
 * @var array
 */
protected $fillable = ['FEC_HOJ','FIN_HOJ'];

/**
 * The attributes excluded from the model's JSON form.
 *
 * @var array
 */
protected $guarded =['id'];
}
