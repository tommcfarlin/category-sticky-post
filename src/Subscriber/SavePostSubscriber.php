<?php

namespace TomMcFarlin\CategoryStickyPost\Subscriber;

use TomMcFarlin\CategoryStickyPost\WordPress\Admin\SavePostService;

class SavePostSubscriber extends AbstractSubscriber {
	public function subscribe() {
		( new SavePostService() )->add( 'save_post' );
	}
}
