<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prasangha extends Model
{
	protected $table="prasanghas";
    protected $fillable=['prasangha_name','prasangha_author','prasangha_year'];
}
