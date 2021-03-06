<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
// use Illuminate\Database\Eloquent\SoftDeletes;


class Slot extends Model
{
    // use SoftDeletes; // 
    // protected $dates = ['deleted_at'];
    //protected $dateFormat = 'dd/mm/yyyy';
    protected $fillable = [
        'price', 'project_id', 'project_name', 'project_slug', 'investasion_id', 'status', 'user_id', 'user_name', 
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function investasion()
    {
        return $this->belongsTo('App\Slot');   
    }

}
