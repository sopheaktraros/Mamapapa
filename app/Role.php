<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'user_roles';
    protected $fillable = ['user_group_id', 'name', 'description', 'active', 'delete'];

	public function scopeActive($q)
    {
        return $q->where('active', 1);
    }

	/**
	 * The "booting" method of the model.
	 *
	 * @return void
	 */
	protected static function boot()
	{
		parent::boot();

		static::addGlobalScope('availableRoles', function (Builder $builder) {
			$builder->where('delete', '=', 0);
		});
	}

	/**
	 * @param $q
	 *
	 * @return mixed
	 */
	public function scopeExceptRoot($q) {
		return $q->where('id', '!=', 1);
    }

	/**
	 * Relationship many-to-many with permissions
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
    public function permission()
    {
        return $this->belongsToMany('App\UserPermission', 'user_permission_roles', 'role_id', 'permission_id')->withPivot('read', 'write', 'delete');
    }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function userGroup() {
		return $this->belongsTo('App\UserGroup');
    }
}
