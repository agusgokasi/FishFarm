<?php

namespace App;

use Auth;
use Hootlex\Moderation\Moderatable;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use Moderatable;

    protected $fillable = [
        'username' ,'user_name', 'nominal', 'phone', 'nomor_rekening_user', 'bank', 
        'admin_name', 'nomor_rekening_admin', 'proof_image_withdraw', 'user_id',
    ];

    public function user()
    {
    return $this->belongsTo('App\User');
    }
    
    public function transactions()
    {
        return $this->belongsTo('App\User');
    }
    //protected $dateFormat = 'dd/mm/yyyy';

    public function isOwner()
    {
        if (Auth::guest())
            return false;
        
        return Auth::user()->id == $this->user->id;
    }
}
