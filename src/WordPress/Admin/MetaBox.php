<?php

namespace TomMcFarlin\CategoryStickyPost\WordPress\Admin;

class MetaBox extends AbstractMetaBox {

	public function __construct( string $hook ) {
		$this->hook = $hook;
	}

	public function load() {
		add_action( $this->hook, [ $this, 'render' ] );
	}

	public function render() {
		add_meta_box(
			'category-sticky-post-metabox',
			'Category Sticky Post',
			[ $this, 'display' ],
			'post',
			'side',
			'default'
		);
	}

	public function display() {
		include_once 'Views/Categories.php';
	}
}
