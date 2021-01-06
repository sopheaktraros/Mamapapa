<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    protected $table = 'user_permissions';
    protected $fillable = ['name', 'label', 'parent'];

	public function scopeParent($q) {
		return $q->whereNull('parent');
    }

	public function children() {
		return $this->hasMany('App\UserPermission', 'parent')->whereNotNull('parent');
    }
}
