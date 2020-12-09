<?php

namespace TomMcFarlin\CategoryStickyPost\WordPress\Admin;

class SavePostProcessor {

	public function save( string $hook ) {
		add_action( $hook, [ $this, 'save_post' ] );
	}

	public function save_post( int $post_id ) {
		if ( ! $this->has_proper_values( 'category_sticky_post_nonce', 'post' ) ) {
			return;
		}

		if ( ! $this->user_can_save( $post_id, 'category_sticky_post_nonce' ) ) {
			return;
		}

		update_post_meta(
			$post_id,
			'category_sticky_post',
			filter_input( INPUT_POST, 'category_sticky_post' )
		);
	}

	private function has_proper_values( $nonce, $post_type ) {
		return
			null !== filter_input( INPUT_POST, $nonce ) ||
			$post_type !== filter_input( INPUT_POST, $post_type );
	}

	private function user_can_save( $post_id, $nonce ) {
		$is_autosave    = wp_is_post_autosave( $post_id );
		$is_revision    = wp_is_post_revision( $post_id );
		$is_valid_nonce = wp_verify_nonce( filter_input ( INPUT_POST, $nonce ), WP_PLUGIN_DIR . '/category-sticky-post' );

		// Return true if the user is able to save; otherwise, false.
		return ! ( $is_autosave || $is_revision ) && $is_valid_nonce;
	}
}
