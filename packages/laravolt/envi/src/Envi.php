<?php

namespace Laravolt\Envi;

use Illuminate\Database\Eloquent\Model;

class Envi extends Model
{
	protected $table='envis';
	protected $fillable=['name','value'];
    //
}
