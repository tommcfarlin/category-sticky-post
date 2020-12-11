<?php

namespace TomMcFarlin\CategoryStickyPost\Utilities;

use WP_Query;

class Service {
	protected function is_category_page( WP_Query $query ) {
		return (
			$query->is_main_query() && is_archive() && 0 === get_query_var( 'paged' ) && '' !== get_query_var( 'cat' )
		);
	}
}
