<?php

namespace sccventas;

use Illuminate\Database\Eloquent\Model;

class Programacion extends Model
{
  protected $table = 'programacion';

/**
 * The attributes that are mass assignable.
 *
 * @var array
 */
protected $fillable = ['PIV_PRO','POS_PRO','OBS_PRO','ID_MAT','ID_HOJ'];

/**
 * The attributes excluded from the model's JSON form.
 *
 * @var array
 */
protected $guarded =['id'];
}
