<?php

namespace TomMcFarlin\CategoryStickyPost\WordPress;

class PostClassService {

	public function process( string $hook ) {
		add_filter( $hook, [ $this, 'apply_post_class' ], 10, 1 );
	}

	public function apply_post_class( array $classes ) {
		if ( ! ( is_category() && $this->is_sticky_post() ) ) {
			return $classes;
		}
		$classes[] = 'category-sticky';

		return $classes;
	}

	private function is_sticky_post() {
		// phpcs:ignore
		return
			(int) get_query_var( 'cat' ) === (int) get_post_meta( get_the_ID(), 'category_sticky_post', true );
	}
}
