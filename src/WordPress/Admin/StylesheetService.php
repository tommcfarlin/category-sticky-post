<?php

namespace TomMcFarlin\CategoryStickyPost\WordPress\Admin;

use TomMcFarlin\CategoryStickyPost\Utilities\Service;

class StylesheetService extends Service {
	public function load( string $hook ) {
			add_action( $hook, [ $this, 'add_stylesheet' ] );
	}

	public function add_stylesheet() {
		global $wp_the_query;
		if ( ! $this->is_category_page( $wp_the_query ) ) {
			return;
		}
		wp_enqueue_style(
			'category-sticky-post',
			plugins_url( '/category-sticky-post/assets/css/plugin.css' ),
			[],
			time(),
			'screen'
		);
	}
}
