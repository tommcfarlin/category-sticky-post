<?php
// TODO
?>
<!-- TODO change styles -->
<div class="category-sticky-post" style="margin:0 0 -1em 0 !important;padding:0em;">
	<p style="margin:0 !important;padding:1em;">
		<select style="width:90%;">
			<option value="0">Select a category...</option>
			<?php foreach ( get_categories() as $category ) : ?>
				<option value="<?php $category->term_id; ?>">
					<?php echo ucwords( $category->category_nicename ); // phpcs:ignore ?>
				</option>
			<?php endforeach; ?>
		</select>
	</p>
</div><!-- .wrap -->
