<?php

namespace TomMcFarlin\CategoryStickyPost\WordPress\Admin;

class SavePostProcessor {

	private $meta_key;

	private $nonce;

	private $post_type;

	public function __construct() {
		$this->meta_key  = 'category_sticky_post';
		$this->nonce     = 'category_sticky_post_nonce';
		$this->post_type = 'post';
	}

	public function save( string $hook ) {
		add_action( $hook, [ $this, 'save_post' ], 99, 1 );
	}

	public function save_post( int $post_id ) {
		if ( ! $this->has_proper_values( $this->nonce, $this->post_type ) ) {
			return;
		}

		if ( ! $this->user_can_save( $post_id, $this->nonce ) ) {
			return;
		}

		// If this category has a sticky post somewhere, we need to remove it.
		$this->remove_existing_category_sticky_value();

		// Remove any previously stored meta key for this post.
		if ( 0 < filter_input( INPUT_POST, $this->meta_key ) ) {
			update_post_meta(
				$post_id,
				$this->meta_key,
				filter_input( INPUT_POST, $this->meta_key )
			);
		}
	}

	private function has_proper_values( $nonce, $post_type ) {
		return // phpcs:ignore
			filter_input( INPUT_POST, $nonce ) !== null ||
			filter_input( INPUT_POST, $post_type ) !== $post_type;
	}

	private function user_can_save( $post_id, $nonce ) {
		$is_autosave    = wp_is_post_autosave( $post_id );
		$is_revision    = wp_is_post_revision( $post_id );
		$is_valid_nonce = wp_verify_nonce( filter_input ( INPUT_POST, $nonce ), WP_PLUGIN_DIR . '/category-sticky-post' );

		// Return true if the user is able to save; otherwise, false.
		return ! ( $is_autosave || $is_revision ) && $is_valid_nonce;
	}

	private function remove_existing_category_sticky_value() {
		global $wpdb;
		$wpdb->query(
			$wpdb->prepare("
				DELETE FROM $wpdb->postmeta
				WHERE meta_key = %s AND meta_value = %d
			",
			$this->meta_key,
			(int) filter_input( INPUT_POST, $this->meta_key )
			)
		);
	}
}
