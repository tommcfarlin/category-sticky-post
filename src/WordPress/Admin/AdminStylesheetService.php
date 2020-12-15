<?php

namespace TomMcFarlin\CategoryStickyPost\WordPress\Admin;

use TomMcFarlin\CategoryStickyPost\Utilities\Service;

class AdminStylesheetService extends Service {
	public function add( string $hook ) {
			add_action( $hook, [ $this, 'add_stylesheet' ] );
	}

	public function add_stylesheet() {
		if ( 'post' !== get_current_screen()->id ) {
			return;
		}

		wp_enqueue_style(
			'category-sticky-post',
			plugins_url( '/category-sticky-post/assets/css/admin.css' ),
			[],
			time(),
			'screen'
		);
	}
}
