<?php

namespace App\Models;
use App\BaseModel;

use Illuminate\Database\Eloquent\Model;

class Menu extends BaseModel
{
	protected $fillable =['menu_name','event_id']; 

	protected $rules = [
	'menu_name'=>'required'
	];
    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

    public function menu_items()
    {
        return $this->hasMany('App\Models\MenuItem');
    }
}
