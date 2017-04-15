<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    protected $table="shows";
    protected $fillable=['mela_id','prasangha_id','show_producer_name','show_date','show_time','contact1','contact2','village','taluk','district','PINCODE'];

    public function mela()
    {
    	return $this->hasOne('App\Mela','mela_id','mela_id');
    }
}
