<?php

namespace TomMcFarlin\CategoryStickyPost\Subscriber;

use TomMcFarlin\CategoryStickyPost\WordPress\PostClassService;

class PostClassSubscriber extends AbstractSubscriber {
	public function subscribe() {
		( new PostClassService() )->process( 'post_class' );
	}
}
