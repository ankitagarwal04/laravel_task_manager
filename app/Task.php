<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     protected $table = 'tasks';

    /**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user() 
	{
		return $this->belongsTo('App\User');
	}

}
