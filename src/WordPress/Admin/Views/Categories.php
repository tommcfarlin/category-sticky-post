<?php
// TODO
?>
<!-- TODO change styles -->
<div class="category-sticky-post" style="margin:0 0 -1em 0 !important;padding:0em;">
	<p style="margin:0 !important;padding:1em;">
		<select style="width:90%;" name="category_sticky_post">
			<option value="0">Select a category...</option>
			<?php foreach ( get_categories() as $category ) : ?>
				<option <?php selected( get_post_meta( get_the_ID(), 'category_sticky_post', true ), $category->term_id, true ); ?> value="<?php echo $category->term_id; ?>">
					<?php echo ucwords( $category->category_nicename ); // phpcs:ignore ?>
				</option>
			<?php endforeach; ?>
		</select>
	</p>
	<?php wp_nonce_field( WP_PLUGIN_DIR . '/category-sticky-post', 'category_sticky_post_nonce' ); ?>
</div><!-- .wrap -->
