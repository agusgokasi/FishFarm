<?php

namespace App;

use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cog\Contracts\Ban\Bannable as BannableContract;

class User extends Authenticatable implements MustVerifyEmail, BannableContract
{
    use Notifiable;
    use Bannable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','phone','balance','provider','provider_id',
    ];
    //protected $dateFormat = 'dd/mm/yyyy';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function shouldApplyBannedAtScope()
    {
        return true;
    }

    public function isAdmin()
    {
        if ($this->role == 2) return true;

        return false;
    }

    public function projects()
    {
        return $this->belongsTo('App\Project');
    }

    public function topups()
    {
        return $this->belongsTo('App\Topup');
    }

    public function withdraws()
    {
        return $this->belongsTo('App\Withdraw');
    }
    
    public function transactions()
    {
        return $this->belongsTo('App\Transaction');
    }

    public function slots()
    {
        return $this->belongsTo('App\Slot');   
    }

    public function investasion()
    {
        return $this->belongsTo('App\Slot');   
    }
}
