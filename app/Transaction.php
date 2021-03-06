<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

	protected $fillable = [
	       'user_id' ,'topup_id', 'admin_name', 'nomor_rekening_user', 'nomor_rekening_admin', 'slot_id', 'project_id', 'withdraw_id', 'project_name', 'transaction_type', 'deposit', 'credit', 'status', 'nominal', 'transaction_image_topup', 'transaction_image_withdraw', 'username', 'user_name', 'admin_name', 'phone',
	];
	//protected $dateFormat = 'dd/mm/yyyy';

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function topup()
	{
		return $this->belongsTo('App\Topup');
	}

	public function withdraw()
	{
		return $this->belongsTo('App\Withdraw');
	}

	public function slot()
	{
		return $this->belongsTo('App\Slot');
	}

	public function projects()
	{
	  return $this->belongsTo('App\Project');
	}

	public function investasion()
    {
        return $this->belongsTo('App\Slot');   
    }
}
