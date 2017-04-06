<?php

namespace sccventas;

use Illuminate\Database\Eloquent\Model;

class Vendido extends Model
{
  protected $table = 'vendidos';

/**
 * The attributes that are mass assignable.
 *
 * @var array
 */
protected $fillable = ['CAN_VND','ID_PRO','ID_VEN'];

/**
 * The attributes excluded from the model's JSON form.
 *
 * @var array
 */
protected $guarded =['id'];
}
