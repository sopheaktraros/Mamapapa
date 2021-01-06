<?php

namespace App\AuditTrails;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuditTrail {

	protected $fields, $hidden, $eventType, $old, $new;

	protected $table = 'audit_trails';

	/**
	 * AuditTrail constructor.
	 *
	 * @param $data
	 */
	public function __construct($data) {
		$this->data = $data;
	}

	public function entryDetail() {
		$content = '';

		foreach ($this->data->auditFields as $field) {
			if ($this->data->{$field} != $this->data->getOriginal($field)) {
				$content .= $field . ': ' .  ($this->data->getOriginal($field) ? $this->data->getOriginal($field) . ' -> '  : '') . $this->data->{$field} . '<br>';
			}
		}

		return $content;
	}

	/**
	 * @param $type
	 * @param $event UPDATE | CREATE | DELETE
	 */
	public function record($type, $event) {
		$description = $this->entryDetail();

		DB::table($this->table)->insert([
			'created_at' => Carbon::now(),
			'operation' => $type,
			'event_type' => $event,
			'entry_id' => $this->data->id,
			'created_by' => Auth::user()->id,
			'description' => $description,
		]);
	}

}