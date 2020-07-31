<?php

namespace CleverBookingCalendar;

class Loader {

	protected $actions;
	protected $filters;
	protected $plugin;

	public function __construct( $plugin ) {
		$this->actions = array();
		$this->filters = array();
		$this->plugin  = $plugin;
	}

	public function add_activation_hook( string $file, array $function ) {
		register_activation_hook( $file, $function );

		return $this;
	}

	public function add_action( string $hook, $callback, int $priority = 10, int $accepted_args = 1 ) {
		$this->actions = $this->add( $this->actions, $hook, $callback, $priority, $accepted_args );

		return $this;
	}

	public function add_filter( string $hook, $callback, int $priority = 10, int $accepted_args ) {
		$this->filters = $this->add( $this->filters, $hook, $callback, $priority, $accepted_args );
	}

	public function add( array $hooks, string $hook, $callback, int $priority, int $accepted_args = 1 ) {
		$hooks[] = array(
			'hook'          => $hook,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args,
		);

		return $hooks;
	}

	public function load() {
		foreach ( $this->filters as $filter ) {
			add_filter( $filter['hook'], $filter['callback'], $filter['priority'], $filter['accepted_args'] );
		}

		foreach ( $this->actions as $action ) {
			add_action( $action['hook'], $action['callback'], $action['priority'], $action['accepted_args'] );
		}

		return $this;
	}
}
