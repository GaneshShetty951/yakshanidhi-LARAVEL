<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public function mela()
    {
    	$this->belongsTo('Mela','mela_id');
    }
}
