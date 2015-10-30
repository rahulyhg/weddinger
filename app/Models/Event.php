<?php

namespace App\Models;
use App\BaseModel;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Event extends BaseModel implements SluggableInterface
{

    use SluggableTrait;
    protected $sluggable = [
        'build_from' => 'event_name',
        'save_to'    => 'slug',
    ];

    protected $hidden =['user_id'];
    protected $fillable = ['event_name','event_start_date','event_end_date'];
    protected $rules= [
        'event_name'=>'required',
        'event_start_date'=>'required|date_format:d/m/Y h:i A',
        'event_end_date'=>'required|date_format:d/m/Y h:i A',
    ];


    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }

    public function guestList()
    {
    	return $this->hasMany('App\Models\Guest');
    }

    public function menu()
    {
        return $this->hasOne('App\Models\Menu');
    }

    public function room()
    {
        return $this->hasOne('App\Models\Room');
    }

    public function hashtags()
    {
        return $this->hasMany('App\Models\Hashtag');
    }


    public function getDates()
    {
        return ['event_start_date','event_end_date'];
    }

}
