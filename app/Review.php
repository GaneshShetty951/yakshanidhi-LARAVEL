<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table="reviews";
    protected $fillable=['user_id','show_id','comment_text'];
    public $timestamps = false;
    public function __construct(array $attributes = [])
    {
            parent::__construct($attributes);

            $this->attributes['created_at'] = $this->freshTimestamp();
    }
}
