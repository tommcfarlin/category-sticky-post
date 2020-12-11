<?php

namespace TomMcFarlin\CategoryStickyPost\Subscriber;

use TomMcFarlin\CategoryStickyPost\WordPress\PostClassService;

class PostClassSubscriber extends AbstractSubscriber {
	public function subscribe() {
		( new PostClassService() )->add( 'post_class' );
	}
}
