<?php

namespace  Burgernomics\Models;

class Bookings extends \Illuminate\Database\Eloquent\Model {

	protected $table = 'admingrid_adgrid';

	/**
	 * Get the relationships for the entity.
	 *
	 * @return array
	 */
	public function getQueueableRelations() {
		// TODO: Implement getQueueableRelations() method.
	}

	/**
	 * Get the connection of the entity.
	 *
	 * @return string|null
	 */
	public function getQueueableConnection() {
		// TODO: Implement getQueueableConnection() method.
	}

	/**
	 * Retrieve the model for a bound value.
	 *
	 * @param mixed $value
	 *
	 * @return \Illuminate\Database\Eloquent\Model|null
	 */
	public function resolveRouteBinding( $value ) {
		// TODO: Implement resolveRouteBinding() method.
	}
}