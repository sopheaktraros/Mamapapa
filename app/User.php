<?php

namespace App;

use App\AuditTrails\AuditTrail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'branch_id',
        'name',
        'username',
        'role_id',
        'email',
		'password',
		'balance',
	    'active',
	    'delete',
    ];

    public $auditFields = ['name', 'email'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	/**
	 * The "booting" method of the model.
	 *
	 * @return void
	 */
	protected static function boot()
	{
		parent::boot();

		static::addGlobalScope('availableUsers', function (Builder $builder) {
			$builder->where('delete', '=', 0);
		});

		static::updating(function ($user) {
			(new AuditTrail($user))->record('USER', 'UPDATE');
		});

		static::created(function ($user) {
			(new AuditTrail($user))->record('USER', 'CREATE');
		});

		static::deleting(function ($user) {
			(new AuditTrail($user))->record('USER', 'DELETE');
		});
	}

	/**
	 * Relationship one-to-one with role
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function role()
    {
        return $this->belongsTo('App\Role', 'role_id');
    }

	public function scopeExceptRoot($q) {
		return $q->where('id', '!=', 1);
	}
	
	public function scopeNotDelete($q) {
		return $q->where('delete', 0);
	}
	
	public function scopeActivated($q) {
		return $q->where('active', 1);
    }

}
