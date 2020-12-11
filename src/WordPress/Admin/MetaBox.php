<?php

namespace TomMcFarlin\CategoryStickyPost\WordPress\Admin;

class MetaBox extends AbstractMetaBox {

	public function add( string $hook ) {
		add_action( $hook, [ $this, 'render' ] );
	}

	public function render() {
		add_meta_box(
			'category-sticky-post-metabox',
			'<span style="font-weight:500;font-size:13px;">Category Sticky Post</span>',
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
