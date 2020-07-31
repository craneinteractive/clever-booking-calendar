<?php

namespace CleverBookingCalendar;

use CleverBookingCalendar\Container;
use CleverBookingCalendar\Resource;

class Init extends Container {


	protected $resourcePostType;

	public function __construct() {
	}

	public function run() {
		$this->load_depdendencies();
	}

	private function load_depdendencies() {
		$this->loader = new Loader( $this );
		$this->loader->add_action( 'init', array( 'CleverBookingCalendar\Resource', 'register' ) )
			->load();
	}
}
