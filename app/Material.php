<?php

namespace sccventas;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'material';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['ID_USU','COD_MAT','TIT_MAT','SUB_MAT','ANP_MAT','DUR_MAT','DIR_MAT','PAI_MAT','GUI_MAT','ID_GEN','EST_MAT','RES_MAT','COM_MAT','POR_MAT','ID_UBI','DES_UBI','ACT_MAT','NRO_PRO','ID_PRO','ID_ARC'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded =['id'];
}
