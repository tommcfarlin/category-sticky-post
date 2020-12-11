<?php

namespace TomMcFarlin\CategoryStickyPost\WordPress;

use TomMcFarlin\CategoryStickyPost\Utilities\Service;

use WP_Term;
use WP_Query;

class CategoryPageService extends Service {
	public function add( string $hook ) {
		add_action( $hook, [ $this, 'reorder_category_posts' ], 99, 2 );
	}

	public function reorder_category_posts( array $posts, WP_Query $query ) {
		// We only care to do this for the first page of the archives.
		if ( ! $this->is_category_page( $query ) ) {
			return $posts;
		}

		// Read the current category to find the sticky post and query for the ID of the post.
		$category     = get_category( get_query_var( 'cat' ) );
		$sticky_query = $this->get_sticky_query( $category );

		// If there's a post, then set the post ID.
		$post_id = ( ! isset ( $sticky_query->posts[0] ) ) ? -1 : $sticky_query->posts[0];
		wp_reset_postdata();

		// If the query returns an actual post ID, then let's update the posts.
		if ( -1 === $post_id ) {
			return $posts;
		}

		// Store the sticky post in an array.
		$new_posts = [ get_post( $post_id ) ];

		// Look to see if the post exists in the current list of posts.
		foreach ( $posts as $post_index => $post ) {

			// If so, then remove it so we don't duplicate its display.
			if ( $post_id === $posts[ $post_index ]->ID ) {
				unset( $posts[ $post_index ] );
			}
		}

		// Merge the existing array (with the sticky post first and the original posts second).
		$posts = array_merge( $new_posts, $posts );

		return $posts;
	}

	/**
	 * Creates the label and the checkbox used to give the user the option to hide or to display
	 * the sticky post border.
	 *
	 * @param    WP_Term    $category    The category for which we're looking to find the sticky post.
	 *
	 * @return   WP_Query                The query used to return the category with the sticky post.
	 *
	 * @since    2.0.0
	 */
	private function get_sticky_query( WP_Term $category ) {
		return new WP_Query([
			'fields'         => 'ids',
			'post_type'      => 'post',
			'posts_per_page' => '1',
			'tax_query'      => [
				'terms'            => null,
				'include_children' => false,
			],
			'meta_query'     => [
				[
					'key'   => 'category_sticky_post',
					'value' => $category->term_id,
				],
			],
		]);
	}
}
