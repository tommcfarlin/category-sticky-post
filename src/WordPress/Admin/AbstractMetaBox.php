<?php

namespace TomMcFarlin\CategoryStickyPost\WordPress\Admin;

abstract class AbstractMetaBox {

	protected $hook;

	public function __construct( string $hook ) {
		$this->hook = $hook;
	}

	abstract public function load();
}
