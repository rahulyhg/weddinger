<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    protected $fillable =['tag_name'];

    public function event()
    {
        return $this->belongsTo('Event');
    }

    
}
