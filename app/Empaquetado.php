<?php

namespace sccventas;

use Illuminate\Database\Eloquent\Model;

class Empaquetado extends Model
{
  protected $table = 'empaquetados';

/**
 * The attributes that are mass assignable.
 *
 * @var array
 */
protected $fillable = ['ID_PAQ','ID_ART'];

/**
 * The attributes excluded from the model's JSON form.
 *
 * @var array
 */
protected $guarded =['id'];
}
