<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class investasion extends Model
{

	protected $fillable = [
	       'user_id' , 'username', 'project_id', 'project_name', 'nominal', 'status',
	];
	//protected $dateFormat = 'dd/mm/yyyy';

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function slot()
	{
		return $this->belongsTo('App\Slot');
	}

	public function projects()
	{
	  return $this->belongsTo('App\Project');
	}

	public function transactions()
	{
	  return $this->belongsTo('App\Transaction');
	}
}
