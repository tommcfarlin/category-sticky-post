<?php

namespace TomMcFarlin\CategoryStickyPost\Subscriber;

use TomMcFarlin\CategoryStickyPost\WordPress\CategoryPageService;

class CategoryPageSubscriber extends AbstractSubscriber {
	public function subscribe() {
		( new CategoryPageService() )->add( 'the_posts' );
	}
}
