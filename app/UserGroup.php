<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{

	public function scopeExceptRoot($q) {
		return $q->where('id', '!=', 1);
	}

}
